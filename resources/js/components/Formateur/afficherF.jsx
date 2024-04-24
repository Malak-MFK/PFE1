import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AddForma from './AddForma';

const AffichageF = () => {
  const [formateurs, setFormateurs] = useState([]);
  const [selectedFormateur, setSelectedFormateur] = useState(null);
  const [showAddForm, setShowAddForm] = useState(false);

  useEffect(() => {
    axios.get('http://localhost:8000/api/formateurs')
      .then(response => {
        setFormateurs(response.data);
      })
      .catch(error => {
        console.error('Error fetching formateurs:', error);
      });
  }, []);

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/formateurs/${Number(id)}`);
      setFormateurs(formateurs.filter(formateur => formateur.id !== id));
    } catch (error) {
      console.error('Error deleting formateur:', error);
    }
  };

  const handleAdd = () => {
    setShowAddForm(true);
  };

  const handleClose = () => {
    setShowAddForm(false);
  };

  const handleAddSubmit = (newFormateur) => {
    setFormateurs([...formateurs, newFormateur]);
    setShowAddForm(false);
  };

  return (
    <div>
      {showAddForm && <AddForma onSubmit={handleAddSubmit} onClose={handleClose} />}
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Diplom</th>
            <th>Matricule</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {formateurs.map(formateur => (
            <tr key={formateur.id}>
              <td>{formateur.name}</td>
              <td>{formateur.lastname}</td>
              <td>{formateur.diplom}</td>
              <td>{formateur.matricule}</td>
              <td>
                <img src={`http://localhost:8000/storage/${formateur.image}`} alt={`Formateur ${formateur.name} ${formateur.lastname}`} style={{ width: '50px', height: 'auto' }} />
              </td>
              <td>

                <button onClick={() => handleDelete(formateur.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      <button onClick={handleAdd}>Add</button>
    </div>
  );
};

export default AffichageF;
