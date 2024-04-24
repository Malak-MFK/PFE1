import React, { useState } from 'react'
import { MdDashboardCustomize, MdPeople, MdPeopleOutline,MdAnnouncement } from 'react-icons/md'
import './Sidebar.css'
function Sidebar({ openSidebarToggle, OpenSidebar }) {
 return (
<aside id="sidebar" className={openSidebarToggle ? "sidebar-responsive" : ""}>
<div className='sidebar-title'>
<span className='icon close_icon' onClick={OpenSidebar}>✕</span>
</div>
<ul className='sidebar-list'>
<li className='sidebar-list-item'>
<a href="/">
<MdDashboardCustomize className='icon' /> Dashboard
</a>
</li>
<li className='sidebar-list-item'>
<a href="/Stagiaire">
<MdPeople className='icon' /> Stagiaires
</a>
</li>
<li className='sidebar-list-item'>
<a href="/Formateur">
<MdPeople className='icon' /> Formateur
</a>
</li>

<li className='sidebar-list-item'>
<a href="/Announcement">
<MdAnnouncement className='icon' />Annonce</a></li>
</ul>
</aside>
)
}
export default Sidebar
