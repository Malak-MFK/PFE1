import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AddForm from './Addform';

const Affichage = () => {
  const [stagiaires, setStagiaires] = useState([]);
  const [selectedStagiaire, setSelectedStagiaire] = useState(null);
  const [showAddForm, setShowAddForm] = useState(false);
  const [groupeFilter, setGroupeFilter] = useState('');

  useEffect(() => {
    axios.get('http://localhost:8000/api/stagiaires')
      .then(response => {
        setStagiaires(response.data);
      })
      .catch(error => {
        console.error('Error fetching stagiaires:', error);
      });
  }, []);

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/stagiaires/${id}`);
      setStagiaires(stagiaires.filter(stagiaire => stagiaire.id !== id));
    } catch (error) {
      console.error('Error deleting stagiaire:', error);
    }
  };

  const handleClose = () => {
    setShowAddForm(false);
    window.location.reload();
  };

  const handleAdd = () => {
    setShowAddForm(true);
  };

  const handleAddSubmit = (newStagiaire) => {
    setStagiaires([...stagiaires, newStagiaire]);
    setShowAddForm(false);
  };

  const groupes = [...new Set(stagiaires.map(stagiaire => stagiaire.groupe))];

  const handleGroupeChange = (e) => {
    setGroupeFilter(e.target.value);
  };

  const filteredStagiaires = groupeFilter ? stagiaires.filter(stagiaire => stagiaire.groupe === groupeFilter) : stagiaires;

  return (
    <div>
      <select value={groupeFilter} onChange={handleGroupeChange}>
        <option value="">Filter by groupe</option>
        {groupes.map(groupe => (
          <option key={groupe} value={groupe}>{groupe}</option>
        ))}
      </select>
      {showAddForm && <AddForm onSubmit={handleAddSubmit} onClose={handleClose} />}
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>CEF</th>
            <th>Num Inscription</th>
            <th>Groupe</th>
            <th>Date Naissance</th>
            <th>Date Inscription</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {filteredStagiaires.map(stagiaire => (
            <tr key={stagiaire.id}>
              <td>{stagiaire.name}</td>
              <td>{stagiaire.lastname}</td>
              <td>{stagiaire.cef}</td>
              <td>{stagiaire.num_inscription}</td>
              <td>{stagiaire.groupe}</td>
              <td>{stagiaire.date_naissance}</td>
              <td>{stagiaire.date_inscription}</td>
              <td>
                <img src={`http://localhost:8000/storage/${stagiaire.image}`} alt={`Stagiaire ${stagiaire.name} ${stagiaire.lastname}`} style={{ width: '50px', height: 'auto' }} />
              </td>
              <td>
                <button onClick={() => handleDelete(stagiaire.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      <button onClick={handleAdd}>Add</button>
    </div>
  );
};

export default Affichage;
