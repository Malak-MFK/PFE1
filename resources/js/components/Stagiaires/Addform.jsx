import { useState } from 'react';
import axios from 'axios';
import React from 'react';
import ReactDOM from 'react-dom/client';

const AddForm = () => {
  const [name, setName] = useState('');
  const [lastname, setLastname] = useState('');
  const [cef, setCef] = useState('');
  const [numInscription, setNumInscription] = useState('');
  const [dateNaissance, setDateNaissance] = useState('');
  const [dateInscription, setDateInscription] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();

    console.log('Form submitted!');

    try {
      const response = await axios.post('/api/stagiaires', {
        name,
        lastname,
        cef,
        num_inscription: numInscription,
        date_naissance: dateNaissance,
        date_inscription: dateInscription,
      });

      console.log('Response received:', response.data);

      setName('');
      setLastname('');
      setCef('');
      setNumInscription('');
      setDateNaissance('');
      setDateInscription('');
    } catch (error) {
      console.error('Error:', error.response.data);
    }
  };

  return (
   <div> <form onSubmit={handleSubmit}>
      <label htmlFor="name">Name:</label>
      <input
        type="text"
        id="name"
        value={name}
        onChange={(e) => setName(e.target.value)}
      /><br/>

      <label htmlFor="lastname">Lastname:</label>
      <input
        type="text"
        id="lastname"
        value={lastname}
        onChange={(e) => setLastname(e.target.value)}
      /><br/>

      <label htmlFor="cef">CEF:</label>
      <input
        type="text"
        id="cef"
        value={cef}
        onChange={(e) => setCef(e.target.value)}
      /><br/>

      <label htmlFor="numInscription">Num Inscription:</label>
      <input
        type="text"
        id="numInscription"
        value={numInscription}
        onChange={(e) => setNumInscription(e.target.value)}
      /><br/>

      <label htmlFor="dateNaissance">Date Naissance:</label>
      <input
        type="date"
        id="dateNaissance"
        value={dateNaissance}
        onChange={(e) => setDateNaissance(e.target.value)}
      /><br/>

      <label htmlFor="dateInscription">Date Inscription:</label>
      <input
        type="date"
        id="dateInscription"
        value={dateInscription}
        onChange={(e) => setDateInscription(e.target.value)}
      /><br/>

      <button type="submit">Add Stagiaire</button>



    </form>
    <a href="/Stagiaire"><button>return</button></a>
</div>
  );
};

export default AddForm;

if (document.getElementById('add')) {
    const Index = ReactDOM.createRoot(document.getElementById("add"));

    Index.render(
      <React.StrictMode>
        <AddForm/>
      </React.StrictMode>
    )
  }

