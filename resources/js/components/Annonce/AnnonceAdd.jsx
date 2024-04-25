import React, { useState } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';

const AnnonceAdd = () => {
  const [description, setDescription] = useState('');
  const [status, setStatus] = useState('en cours');
  const [image, setImage] = useState(null);

  const handleSubmit = async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append('description', description);
    formData.append('status', status);
    formData.append('image', image);

    try {
      const response = await axios.post('/api/announcements', formData, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      });

      console.log('Response received:', response.data);

      // Set form fields to initial values
      setDescription('');
      setStatus('en cours');
      setImage(null);

      // Rafraîchir la page
      location.reload();
    } catch (error) {
      console.error('Error:', error.response.data);
    }
  };

  return (
    <div>
      <form onSubmit={handleSubmit}>
        <label htmlFor="description">Description:</label>
        <input
          type="text"
          id="description"
          value={description}
          onChange={(e) => setDescription(e.target.value)}
        /><br/>

        <label htmlFor="status">Status:</label>
        <select
          id="status"
          value={status}
          onChange={(e) => setStatus(e.target.value)}
        >
          <option value="en cours">en cours</option>
          <option value="fini">fini</option>
        </select>
         <br/>
        <label htmlFor="image">Image:</label>
        <input
          type="file"
          id="image"
          onChange={(e) => setImage(e.target.files[0])}
         />
         <br/>
        <button type="submit">Add Announcement</button>

      </form>
    </div>
  );
};

export default AnnonceAdd;