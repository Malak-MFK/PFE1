import React, { useState } from 'react'
import { MdExpandMore, MdExpandLess } from 'react-icons/md'


function DropdownMenu({ title, expanded, setExpanded, children }) {
  return (
    <li className='sidebar-list-item dropdown-parent'>
      <div className='dropdown-toggle' onClick={() => setExpanded(!expanded)}>
        {title}
        {expanded ? <MdExpandLess className='dropdown-icon' /> : <MdExpandMore className='dropdown-icon' />}
      </div>
      <ul className={`sidebar-sublist dropdown-menu ${expanded ? 'show' : ''}`}>
        {children}
      </ul>
    </li>
  )
}

export default DropdownMenu
