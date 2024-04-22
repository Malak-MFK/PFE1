import React from 'react';
import { FaUsers, FaChalkboardTeacher, FaUsersCog } from 'react-icons/fa';
import './Home.css';

function Home() {
  const absences = [
    {
      date: '2023-02-20',
      student: 'John Doe',
      reason: 'Sick'
    },
    {
      date: '2023-02-21',
      student: 'Jane Smith',
      reason: 'Family emergency'
    },
    {
      date: '2023-02-22',
      student: 'Mike Johnson',
      reason: 'sick'
    },
    {
      date: '2023-02-23',
      student: 'Sara Lee',
      reason: 'Medical appointment'
    },
    {
      date: '2023-02-24',
      student: 'James White',
      reason: 'Sick'
    },
    {
      date: '2023-02-25',
      student: 'Alex Brown',
      reason: 'Vacation'
    },
    {
      date: '2023-02-26',
      student: 'Emma Green',
      reason: 'Medical appointment'
    }
  ];

  return (
    <main className='main-container'>
      <div className='main-title'>
        <h3>DASHBOARD</h3>
      </div>
      <div className='main-cards'>
        <div className='card'>
          <div className='card-inner'>
            <FaUsersCog className='card_icon' />
            <h3>Formateurs</h3>
            <p>300</p>
          </div>
        </div>
        <div className='card'>
          <div className='card-inner'>
            <FaUsers className='card_icon' />
            <h3>Trainees</h3>
            <p>12</p>
          </div>
        </div>
        <div className='card'>
          <div className='card-inner'>
            <FaChalkboardTeacher className='card_icon' />
            <h3>Groups</h3>
            <p>33</p>
          </div>
        </div>
      </div>
      <div className='main-cards'>
        <div className='card'>
          <div className='card-inner'>
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Student</th>
                  <th>Reason</th>
                </tr>
              </thead>
              <tbody>
                {absences.map((absence, index) => (
                  <tr key={index}>
                    <td>{absence.date}</td>
                    <td>{absence.student}</td>
                    <td>{absence.reason}</td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  );
}

export default Home;
