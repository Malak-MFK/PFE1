import React, { useState } from 'react'
import { MdDashboardCustomize, MdPeople, MdExpandMore, MdExpandLess, MdPeopleOutline } from 'react-icons/md'
import DropdownMenu from './DropdownMenu'
import './Sidebar.css'

function Sidebar({ openSidebarToggle, OpenSidebar }) {
  const [stagiairesCollapsed, setStagiairesCollapsed] = useState(false)
  const [attestationsCollapsed, setAttestationsCollapsed] = useState(false)

  return (
    <aside id="sidebar" className={openSidebarToggle ? "sidebar-responsive" : ""}>
      <div className='sidebar-title'>
        <span className='icon close_icon' onClick={OpenSidebar}>✕</span>
      </div>

      <ul className='sidebar-list'>
        <li className='sidebar-list-item'>
          <a href="">
            <MdDashboardCustomize className='icon' /> Dashboard
          </a>
        </li>
        <DropdownMenu
          title={<><MdPeople className='icon' /> Stagiaires</>}
          expanded={stagiairesCollapsed}
          setExpanded={setStagiairesCollapsed}
        >
          <li className='sidebar-sublist-item'>
            <a href="">Ajouter</a>
          </li>
          <li className='sidebar-sublist-item'>
            <a href="">Afficher</a>
          </li>
        </DropdownMenu>
        <DropdownMenu
          title={<><MdPeopleOutline className='icon' /> Attestations</>}
          expanded={attestationsCollapsed}
          setExpanded={setAttestationsCollapsed}
        >
          <li className='sidebar-sublist-item'>
            <a href="">attestation de scolarité</a>
          </li>
          <li className='sidebar-sublist-item'>
            <a href="">certificat médical</a>
          </li>

        </DropdownMenu>
      </ul>
    </aside>
  )
}

export default Sidebar
