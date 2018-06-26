@extends('base')

@section('favoritos')

    @include('dashboard.partials.favoritos')

@endsection


@section('contenido')

<div class="box box-primary">
    <div class="box-body">
        <h2>Sistemas</h2>
        <p class="lead">Listado de sistema del Ministerio de Desarrollo Social.</p>


        {!! Form::open(['method'=>'GET','url'=> route('sistemas.index'),'class'=>'form','role'=>'search'])  !!}
        <div class="form-group">
            <div class="input-group">
                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar sistema...']) !!}
                <span class="input-group-btn">
                <button class="btn btn-flat" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>
        {!! Form::close() !!}



        <ul class="list-group">
            <li class="list-group-item">
                <span class="info-box-icon">
                    <img src="https://portal.mds.gob.ar/sistemas/show-image/1450284020HK.jpg">
                </span>
                <div class="info-box-content">
                    <a href="http://organizaciones.desarrollosocial.gov.ar/" target="_blank">
                        <h3>Acreditación de Organizaciones</h3>
                    </a>
                    <p>Registra y categoriza todas las organizaciones administradoras de fondos que actúan como intermediarias entre el Ministerio de Desarrollo Social y los Titulares de Derecho.</p>
                </div>
            </li>
            <li class="list-group-item">
                <span class="info-box-icon">
                    <img src="https://portal.mds.gob.ar/sistemas/show-image/1450364381of.jpg">
                </span>
                <div class="info-box-content">
                    <a href="http://www.adel.min/admin/" target="_blank">
                        <h3>Adel</h3>
                    </a>
                    <p>Sistema de control de mercadería que se entrega a los titulares de derecho. Genera las actas de entrega y las vincula con los expedientes correspondientes.</p>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450362535Y5.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://compras.desarrollosocial.gob.ar/" target="_blank">
                            <h3>Cartelera de Compras</h3>
                        </a>
                        <p>Es una Página Web de acceso público en la que se puede visualizar una cartelera con información sobre las licitaciones y contrataciones del Organismo.</p>

                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450281918f9.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://www.ciem.min/" target="_blank">
                           <h3>CIEM</h3>
                        </a>
                        <p>El sistema se encarga de registrar el ingreso y egreso de mercaderías en los depósitos del organismo. Además controla los estados de esa mercadería, y el stock existente. </p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1456508808Ru.png">
                    </span>
                    <div class="info-box-content">
                        <a href="http://comser.mds.gob.ar/" target="_blank">
                            <h3>Comser</h3>
                        </a>
                        <p>Sistema para generación de comisiones de servicio</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450282388jl.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="https://registroefectores.desarrollosocial.gov.ar/" target="_blank">
                            <h3>EFECTORES</h3>
                        </a>
                        <p>El sistema permite llevar a cabo el registro de las personas que integran los Proyectos Productivos y asociados a las cooperativas, a fin de administrar los denominados “Titulares de Derecho del Monotributo Social”.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450364732Xh.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://ellas.pagos.desarrollosocial.gov.ar/" target="_blank">
                            <h3>Ellas Pagos</h3>
                        </a>
                        <p>Sistema para registrar y visualizar los pagos del plan Ellas Hacen.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450365649GQ.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://www.formateenred.gob.ar/" target="_blank">
                            <h3>Formate en Red</h3>
                        </a>
                        <p>Es una plataforma virtual para articular y construir espacios de formación y capacitación en el territorio digital. Formate en Red busca generar una comunidad para construir conocimiento de manera colectiva en todo el país.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450284498HT.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://insol2.desarrollosocial.gov.ar/" target="_blank">
                            <h3>INSOL</h3>
                        </a>
                        <p>Registra los relevamientos sociales a los titulares de derecho del Ministerio. Permite ver el estado de cada caso y las necesidades de las personas según los trabajadores sociales del organismo.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450365155ST.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://www.judiciales.min/" target="_blank">
                            <h3>Judiciales</h3>
                        </a>
                        <p>Sistema para el control interno de los expedientes de la Dirección de Asuntos Judiciales y correspondiente seguimiento de su judicialización.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450363644kY.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://www.legales.min/" target="_blank">
                            <h3>Legales</h3>
                        </a>
                        <p>Sistema de gestión de expedientes posibilitando la asignación de abogados registrando las novedades de cada caso. A su vez permite luego extraer estadísticas por problemática.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450281482eI.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="https://librointerno.mds.gob.ar/" target="_blank">
                            <h3>Libro Interno</h3>
                        </a>
                        <p>El Sistema Web permite a cada área realizar un seguimiento y e identificación mediante números automáticos de notas, memos y providencias enviadas o recibidas, incorporando la fecha, el usuario que lo gestionó, e información general.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450366020A8.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="https://webcredito.desarrollosocial.gov.ar/" target="_blank">
                            <h3>Microcréditos</h3>
                        </a>
                        <p>Es un Sistema que maneja toda la operatoria de los Créditos otorgados a traves del plan Microcréditos.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450366261X9.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://www.patrimonio.min/" target="_blank">
                            <h3>Patrimonio</h3>
                        </a>
                        <p>Es un sistema en el que se registran y consultan los bienes patrimoniales del Organismo.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450283635Yz.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://contacto.desarrollosocial.gob.ar/" target="_blank">
                            <h3>SICOI</h3>
                        </a>
                        <p>Sistema para registro de consultas que se realizan al organismo a través de diferentes medios de comunicación incluyendo redes sociales.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1450281240zO.jpg">
                    </span>
                    <div class="info-box-content">
                        <a href="http://sisex.mds.gob.ar/" target="_blank">
                            <h3>SISEX (Sólo Consulta)</h3>
                        </a>
                        <p>Es una Página Web, en la que solo se puede consultar el estado en el que se encuentran los trámites ingresados en el Sistema SISEX, con sus respectivos pases.</p>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="info-box">
                    <span class="info-box-icon">
                        <img src="https://portal.mds.gob.ar/sistemas/show-image/1452858808fM.png">
                    </span>
                    <div class="info-box-content">
                        <a href="http://www.talleres.min/" target="_blank">
                            <h3>Talleres Familiares</h3>
                        </a>
                        <p>Es un sistema de registro de carga de los Titulares de Derecho, movimiento de documentación entre áreas, cambio de estados de los solicitantes. Informes y reportes para cuantificar las prestaciones otorgadas.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

@endsection

@section('sidebar')

    @include('sidebar.sidebar')

@endsection