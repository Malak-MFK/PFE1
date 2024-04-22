import React, { useState } from 'react';

const Editform = ({ stagiaire, onSubmit }) => {
const [name, setName] = useState(stagiaire.name);
const [lastname, setLastname] = useState(stagiaire.lastname);
const [cef, setCEF] = useState(stagiaire.cef);
const [numInscription, setNumInscription] = useState(stagiaire.num_inscription);
const [dateNaissance, setDateNaissance] = useState(stagiaire.date_naissance);
const [dateInscription, setDateInscription] = useState(stagiaire.date_inscription);
const handleSubmit = (event) => {
event.preventDefault();
const updatedStagiaire = {
...stagiaire,
name,
lastname,
cef,
num_inscription: numInscription,
date_naissance: dateNaissance,
date_inscription: dateInscription,
};
onSubmit(updatedStagiaire);

};
const handleClose = () => {
    onClose();
    };
return (
    <div>
<form onSubmit={handleSubmit}>
<label>
Name:
<input type="text" value={name} onChange={(e) => setName(e.target.value)} />
</label>
<br />
<label>
Last name:
<input type="text" value={lastname} onChange={(e) => setLastname(e.target.value)} />
</label>
<br />
<label>
CEF:
<input type="text" value={cef} onChange={(e) => setCEF(e.target.value)} />
</label>
<br />
<label>
Num Inscription:
<input type="text" value={numInscription} onChange={(e) => setNumInscription(e.target.value)} />
</label>
<br />
<label>
Date Naissance:
<input type="date" value={dateNaissance} onChange={(e) => setDateNaissance(e.target.value)} />
</label>
<br />
<label>
Date Inscription:
<input type="date" value={dateInscription} onChange={(e) => setDateInscription(e.target.value)} />
</label>
<br />
<button type="submit">Update</button>
</form>
<button type="button" onClick={handleClose}>Close</button></div>
);
};
export default Editform;

if (document.getElementById('edit')) {
const [selectedStagiaire, setSelectedStagiaire] = useState(null);
const handleEdit = (stagiaire) => {
setSelectedStagiaire(stagiaire);
};
const handleUpdate = (updatedStagiaire) => {
    axios.put(`http://localhost:8000/api/stagiaires/${updatedStagiaire.id}`, updatedStagiaire)
    .then((response) => {
    setSelectedStagiaire(null);
    setStagiaires(stagiaires.map((stagiaire) => (stagiaire.id === updatedStagiaire.id ? updatedStagiaire : stagiaire)));
    })
    .catch((error) => {
    console.log(error);
    });
    };
const Index = ReactDOM.createRoot(document.getElementById("edit"));
Index.render(
<React.StrictMode>
<Editform stagiaire={selectedStagiaire} onSubmit={handleUpdate} />
</React.StrictMode>
)
}
