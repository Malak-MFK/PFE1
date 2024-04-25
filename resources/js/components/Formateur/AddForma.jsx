import { useState } from 'react';
import axios from 'axios';

const AddForma = ({ onClose }) => {
  const [name, setName] = useState('');
  const [lastname, setLastname] = useState('');
  const [diplom, setDiplom] = useState('');
  const [matricule, setMatricule] = useState('');
  const [image, setImage] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append('name', name);
    formData.append('lastname', lastname);
    formData.append('diplom', diplom);
    formData.append('matricule', matricule);
    formData.append('image', image);

    try {
      const response = await axios.post('/api/formateurs', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      });

      console.log('Response received:', response.data);

      setName('');
      setLastname('');
      setDiplom('');
      setMatricule('');
      setImage(null);

      if (onClose) {
        onClose();
      }

      // Rafraîchir la page
      window.location.reload();
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

        <label htmlFor="diplom">Diplom:</label>
        <input
          type="text"
          id="diplom"
          value={diplom}
          onChange={(e) => setDiplom(e.target.value)}
        /><br/>

        <label htmlFor="matricule">Matricule:</label>
        <input
          type="text"
          id="matricule"
          value={matricule}
          onChange={(e) => setMatricule(e.target.value)}
        /><br/>

        <label htmlFor="image">Image:</label>
        <input
          type="file"
          id="image"
          onChange={(e) => setImage(e.target.files[0])}
        /><br/>

        <button type="submit">Add Formateur</button>
      </form>
    </div>
  );
};

export default AddForma;
