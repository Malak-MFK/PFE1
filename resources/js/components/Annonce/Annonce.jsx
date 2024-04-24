import React from 'react';
import ReactDOM from 'react-dom';
import Header from '../Dashboard/Header';
import Sidebar from '../Dashboard/Sidebar';
import AffichageA from './AfficherA';


function Annonce({ openSidebarToggle, OpenSidebar }) {
  return (
    <div className='grid-container'>
      <Header OpenSidebar={OpenSidebar}/>
      <Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar}/>

       <AffichageA/>
    </div>

  )
}

export default Annonce;

if (document.getElementById('Annonce')) {
  const Index = ReactDOM.createRoot(document.getElementById("Annonce"));

  Index.render(
    <React.StrictMode>
      <Annonce/>
    </React.StrictMode>
  )
}
