import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AddForm from './Addform';


const Affichage = () => {
  const [stagiaires, setStagiaires] = useState([]);
  const [selectedStagiaire, setSelectedStagiaire] = useState(null);
  const [showAddForm, setShowAddForm] = useState(false);

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



  const handleAdd = () => {
    setShowAddForm(true);
  };

  const handleClose = () => {
    setShowAddForm(false);
  };

  const handleAddSubmit = (newStagiaire) => {
    setStagiaires([...stagiaires, newStagiaire]);
    setShowAddForm(false);
  };

  return (
    <div>
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
          {stagiaires.map(stagiaire => (
            <tr key={stagiaire.id}>
              <td>{stagiaire.name}</td>
              <td>{stagiaire.lastname}</td>
              <td>{stagiaire.cef}</td>
              <td>{stagiaire.num_inscription}</td>
              <td>{stagiaire.date_naissance}</td>
              <td>{stagiaire.date_inscription}</td>
              <td>{stagiaire.groupe}</td>

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
