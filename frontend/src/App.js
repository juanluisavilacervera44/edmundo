import './App.css';

function App() {
  return (
    <div className="App">
        <div className="header">
            <div className="row navrow align-items-center">
                <div className="col-sm-3 text-center ">
                    <img src="" alt="Logo del ayuntamiento" className="logo"/>

                </div>
                <div className="col-sm-7 d-flex align-items-center nav-div">

                    <nav className="navbar navbar-expand-xl ">
                        <div className="container-fluid d-flex justify-content-center">

                            <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span className="navbar-toggler-icon"></span>
                            </button>
                            <div className="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul className="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-around">

                                    <li className="nav-item dropdown">
                                        <a className="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            Información
                                        </a>
                                        <ul className="dropdown-menu">
                                            <li><a className="dropdown-item" href="#">Contacto</a></li>
                                            <li><a className="dropdown-item" href="#">Organos Consultivos</a></li>
                                        </ul>
                                    </li>

                                    <li className="nav-item dropdown">
                                        <a className="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            Centros Educativos
                                        </a>
                                        <ul className="dropdown-menu">
                                            <li><a className="dropdown-item" href="#">Centros</a></li>
                                            <li><a className="dropdown-item" href="#">Escuela Infantil "La Mota"</a></li>
                                            <li><a className="dropdown-item" href="#">Oferta Educativa</a></li>
                                        </ul>
                                    </li>

                                    <li className="nav-item dropdown">
                                        <a className="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            AMPAs
                                        </a>
                                        <ul className="dropdown-menu">
                                            <li><a className="dropdown-item" href="#">Contactos e Información</a></li>
                                            <li><a className="dropdown-item" href="#">Subvención</a></li>
                                        </ul>
                                    </li>

                                    <li className="nav-item dropdown">
                                        <a className="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            Universidad
                                        </a>
                                        <ul className="dropdown-menu">
                                            <li><a className="dropdown-item" href="">UJA</a></li>
                                            <li><a className="dropdown-item" href="">UNED</a></li>
                                            <li><a className="dropdown-item" href="">Universidad de
                                                Mayores</a></li>
                                            <li><a className="dropdown-item" href="">EVAU</a></li>
                                            <li><a className="dropdown-item" href="">Ayudas
                                            Complementarias</a></li>
                                    </ul>
                                </li>

                                <li className="nav-item">
                                    <a className="nav-link" href="#" role="button" aria-expanded="false">
                                                Aula Mentor
                                            </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div className="col-sm-2">

                </div>
            </div>
        </div>
        <div className="main"></div>
        <div className="footer"></div>
    </div>
  );
}

export default App;
