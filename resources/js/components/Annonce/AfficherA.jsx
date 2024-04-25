import React, { useState, useEffect } from 'react';
import axios from 'axios';
import AnnonceAdd from './AnnonceAdd';

const AffichageA = () => {
  const [announcements, setAnnouncements] = useState([]);
  const [selectedAnnouncement, setSelectedAnnouncement] = useState(null);
  const [showAddForm, setShowAddForm] = useState(false);

  useEffect(() => {
    axios.get('http://localhost:8000/api/announcements')
      .then(response => {
        setAnnouncements(response.data);
      })
      .catch(error => {
        console.error('Error fetching announcements:', error);
      });
  }, []);

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/announcements/${id}`);
      setAnnouncements(announcements.filter(announcement => announcement.id !== id));
    } catch (error) {
      console.error('Error deleting announcement:', error);
    }
  };

  const handleStatusChange = async (id, newStatus) => {
    try {
      const response = await axios.put(`http://localhost:8000/api/announcements/${id}`, {
        status: newStatus
      });

      setAnnouncements(prevAnnouncements => prevAnnouncements.map(announcement => {
        if (announcement.id === id) {
          return {
            ...announcement,
            status: newStatus
          };
        }
        return announcement;
      }));
    } catch (error) {
      console.error('Error updating announcement status:', error);
    }
  };

  const handleAdd = () => {
    setShowAddForm(true);
  };

  const handleClose = () => {
    setShowAddForm(false);
  };

  const handleAddSubmit = (newAnnouncement) => {
    setAnnouncements([...announcements, newAnnouncement]);
    setShowAddForm(false);
  };

  return (
    <div>
      {showAddForm && <AnnonceAdd onSubmit={handleAddSubmit} onClose={handleClose} />}
      <table>
        <thead>
          <tr>
            <th>Description</th>
            <th>Status</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          {announcements.map(announcement => (
            <tr key={announcement.id}>
              <td>{announcement.description}</td>
              <td>
                <select
                  value={announcement.status}
                  onChange={(e) => handleStatusChange(announcement.id, e.target.value)}
                >
                  <option value="en cours">En cours</option>
                  <option value="fini">Fini</option>
                </select>
              </td>
              <td>
                <img src={`http://localhost:8000/storage/${announcement.image}`} alt={`Announcement ${announcement.description}`} style={{ width: '50px', height: 'auto' }} />
              </td>
              <td>
                <button onClick={() => handleDelete(announcement.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      <button onClick={handleAdd}>Add</button>
    </div>
  );
};

export default AffichageA;
