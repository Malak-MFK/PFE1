import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Editform from './Editform';

const Afficher = () => {
  const [stagiaires, setStagiaires] = useState([]);
  const [selectedStagiaire, setSelectedStagiaire] = useState(null);

  useEffect(() => {
    axios.get('http://localhost:8000/api/stagiaires')
      .then(response => {
        setStagiaires(response.data);
      })
      .catch(error => {
        console.log(error);
      });
  }, []);

  const handleDelete = (id) => {
    axios.delete(`http://localhost:8000/api/stagiaires/${id}`)
      .then((response) => {
        console.log('Delete request successful:', response.data);
        setStagiaires(stagiaires.filter(stagiaire => stagiaire.id !== id));
      })
      .catch((error) => {
        console.log('Delete request failed:', error);
      });
  }

  const handleEdit = (stagiaire) => {
    setSelectedStagiaire(stagiaire);
  };

  const handleUpdate = (updatedStagiaire) => {
    axios.put(`http://localhost:8000/api/stagiaires/${updatedStagiaire.id}`, updatedStagiaire)
      .then((response) => {
        setStagiaires(stagiaires.map((stagiaire) => (stagiaire.id === updatedStagiaire.id ? updatedStagiaire : stagiaire)));
      })
      .catch((error) => {
        console.log(error);
      });
  };

  return (
    <div>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Last name</th>
            <th>CEF</th>
            <th>Num Inscription</th>
            <th>Date Naissance</th>
            <th>Date Inscription</th>
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
              <td>
                <button onClick={() => handleEdit(stagiaire)}>Modify</button>
                <button onClick={() => handleDelete(stagiaire.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
      {selectedStagiaire && <Editform stagiaire={selectedStagiaire} onSubmit={handleUpdate} />}
    </div>
  );
};

export default Afficher;
