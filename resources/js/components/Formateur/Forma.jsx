import React from 'react';
import { useState } from 'react'
import ReactDOM from 'react-dom';
import Header from '../Dashboard/Header';
import Sidebar from '../Dashboard/Sidebar';
import AffichageF from './afficherF'


function Forma({ openSidebarToggle, OpenSidebar }) {
  return (
    <div className='grid-container'>
      <Header OpenSidebar={OpenSidebar}/>
      <Sidebar openSidebarToggle={openSidebarToggle} OpenSidebar={OpenSidebar}/>
<AffichageF />

    </div>

  )
}

export default Forma;

if (document.getElementById('Forma')) {
  const Index = ReactDOM.createRoot(document.getElementById("Forma"));

  Index.render(
    <React.StrictMode>
      <Forma/>
    </React.StrictMode>
  )
}
