import React, { useState } from 'react';
import axios from 'axios';

const EditForm = ({ stagiaire, onSubmit, onClose }) => {
  const [name, setName] = useState(stagiaire.name);
  const [lastname, setLastname] = useState(stagiaire.lastname);
  const [cef, setCef] = useState(stagiaire.cef);
  const [numInscription, setNumInscription] = useState(stagiaire.num_inscription);
  const [dateNaissance, setDateNaissance] = useState(stagiaire.date_naissance);
  const [dateInscription, setDateInscription] = useState(stagiaire.date_inscription);
  const [image, setImage] = useState(null);

  const handleSubmit = (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append('name', name);
    formData.append('lastname', lastname);
    formData.append('cef', cef);
    formData.append('num_inscription', numInscription);
    formData.append('date_naissance', dateNaissance);
    formData.append('date_inscription', dateInscription);
    if (image) {
      formData.append('image', image);
    }

    axios.put(`/api/stagiaires/${stagiaire.id}`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    .then(response => {
      onSubmit(response.data);
    })
    .catch(error => {
      // handle error
    });
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <label htmlFor="name">Name:</label>
        <input
          type="text"
          id="name"
          value={name}
          onChange={(e) => setName(e.target.value)}
          required
        /><br/>

        <label htmlFor="lastname">Last Name:</label>
        <input
          type="text"
          id="lastname"
          value={lastname}
          onChange={(e) => setLastname(e.target.value)}
          required
        /><br/>

        <label htmlFor="cef">CEF:</label>
        <input
          type="text"
          id="cef"
          value={cef}
          onChange={(e) => setCef(e.target.value)}
          required
        /><br/>

        <label htmlFor="numInscription">Num Inscription:</label>
        <input
          type="text"
          id="numInscription"
          value={numInscription}
          onChange={(e) => setNumInscription(e.target.value)}
          required
        /><br/>

        <label htmlFor="dateNaissance">Date Naissance:</label>
        <input
          type="date"
          id="dateNaissance"
          value={dateNaissance}
          onChange={(e) => setDateNaissance(e.target.value)}
          required
        /><br/>

        <label htmlFor="dateInscription">Date Inscription:</label>
        <input
          type="date"
          id="dateInscription"
          value={dateInscription}
          onChange={(e) => setDateInscription(e.target.value)}
          required
        /><br/>

        <label htmlFor="image">Image:</label>
        <input
          type="file"
          id="image"
          onChange={(e) => setImage(e.target.files[0])}
        /><br/>

        <button type="submit">Save Changes</button>
        <button type="button" onClick={onClose}>Cancel</button>
      </form>
    </div>
  );
};

export default EditForm;
