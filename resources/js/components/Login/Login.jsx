import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';
import ReactDOM from 'react-dom/client';
import "./Style.css";


const Login = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    // const navigate = useNavigate();

    const urlParams = new URLSearchParams(window.location.search);
    const paramValue = urlParams.get('par');
    console.log(paramValue);
    
    let color = "transparent";
    
    switch (paramValue) {
        case '1':
            color = 'red';
            break;
        case '2':
            color = 'blue';
            break;
        case '3':
            color = 'green';
            break;
        default:
            break;
    }

    console.log(color);

    if (paramValue) {
        // Do something with the parameter value, e.g., redirect or perform an action
    } else {
    // Parameter '2' is not present in the URL
    }


    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/login', { email, password });
            localStorage.setItem('token', response.data.access_token);
            localStorage.setItem('user_id', response.data.user.id);
            localStorage.setItem('user_login', response.data.user.login);
            localStorage.setItem('user_nom', response.data.user.nom);
            localStorage.setItem('user_prenom', response.data.user.prenom);            
            localStorage.setItem('user_role', response.data.user.role);
            console.log('Login successful', response.data);
            console.log(response.data.user);
            console.log(localStorage.getItem('user_login'));
            //navigate("/1");
        } catch (error) {
            console.error('Login failed', error.response.data);
        }
    };

    return (

        <div className='grid-container'>
        
         <fieldset id="fieldset_parent">
            <h1>Authentification</h1>
            <div id='fieldset_div'>
              <fieldset id="fieldset_child">
              <legend>
                <div id="out_circle" style={{backgroundColor:"#D9D9D9"}}>
                  <div id="in_circle" style={{backgroundColor: color}}>
                  </div>
                </div>
              </legend>
                    <form onSubmit={handleSubmit}>
                        <label id="log" htmlFor="login">MyLogin</label><br/>
                        <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} placeholder="Email" required /> <br />
                        <label id="psd" htmlFor="password">Password</label><br/>
                        <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} placeholder="Password" required /> <br />
                        <button id="login_button" type="submit" style={{backgroundColor: color}}>Login</button>
                    </form>
              </fieldset>
            </div>
            </fieldset>

          </div>
    );
};

export default Login;

if (document.getElementById('Login')) {
  const Index = ReactDOM.createRoot(document.getElementById("Login"));

  Index.render(
    <React.StrictMode>
      <Login/>
    </React.StrictMode>
  )
}