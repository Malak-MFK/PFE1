import React from 'react'
import { BsFillBellFill, BsFillEnvelopeFill, BsPersonCircle, BsSearch, BsJustify } from 'react-icons/bs';
import './Header.css';
function Header({ OpenSidebar }) {
  return (
    <header className='header'>
      <div className='menu-icon' onClick={OpenSidebar}>
        <BsJustify className='icon' />
      </div>

      <div className='header-right'>

        <BsFillEnvelopeFill className='icon mail' />
     
      </div>
    </header>
  )
}

export default Header



