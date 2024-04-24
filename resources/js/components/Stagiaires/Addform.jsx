import { useState } from 'react';
import axios from 'axios';
import './AddForm.css';
import ReactDOM from 'react-dom';

const Addform = () => {
  const [name, setName] = useState('');
  const [lastname, setLastname] = useState('');
  const [cef, setCef] = useState('');
  const [numInscription, setNumInscription] = useState('');
  const [dateNaissance, setDateNaissance] = useState('');
  const [dateInscription, setDateInscription] = useState('');
  const [image, setImage] = useState(null);
  const [groupe, setGroupe] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append('name', name);
    formData.append('lastname', lastname);
    formData.append('cef', cef);
    formData.append('num_inscription', numInscription);
    formData.append('date_naissance', dateNaissance);
    formData.append('date_inscription', dateInscription);
    formData.append('image', image);
    formData.append('groupe', groupe);

    try {
      const response = await axios.post('/api/stagiaires', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      });

      console.log('Response received:', response.data);

      setName('');
      setLastname('');
      setCef('');
      setNumInscription('');
      setDateNaissance('');
      setDateInscription('');
      setImage(null);
      setGroupe('');
    } catch (error) {
      console.error('Error:', error.response.data);
    }
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
         />
         <br/>
         <label htmlFor="numInscription">Num Inscription:</label>
         <input
          type="text"
          id="numInscription"
          value={numInscription}
          onChange={(e) => setNumInscription(e.target.value)}
         />
         <br/>
         <label htmlFor="dateNaissance">Date Naissance:</label>
         <input
          type="date"
          id="dateNaissance"
          value={dateNaissance}
          onChange={(e) => setDateNaissance(e.target.value)}
         />
         <br/>
         <label htmlFor="dateInscription">Date Inscription:</label>
         <input
          type="date"
          id="dateInscription"
          value={dateInscription}
          onChange={(e) => setDateInscription(e.target.value)}
         />
         <br/>
         <label htmlFor="groupe">Groupe:</label>
         <input
          type="text"
          id="groupe"
          value={groupe}
          onChange={(e) => setGroupe(e.target.value)}
         />
         <br/>
         <label htmlFor="image">Image:</label>
         <input
          type="file"
          id="image"
          onChange={(e) => setImage(e.target.files[0])}
         />
         <br/>
        <a href='/Stagiaire'> <button type="submit">Add Stagiaire</button></a>


         </form>
         </div>
         );
         };
         export default Addform;
         if (document.getElementById('add')) {
          const Index = ReactDOM.createRoot(document.getElementById("add"));
          Index.render(
          <React.StrictMode>
          <Addform/>
          </React.StrictMode>
          )
         }
