<div class="sidebar-menu">
					<header class="logo1">
					<a href="../index.php" class="sidebar-icon"><i class="fa fa-home"></i></a><a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="../../dashboard.php"><i class="fas fa-home"></i> <span>Panel Principal</span><div class="clearfix"></div></a></li>
										<li id="menu-academico" ><a href="../../manage-users.php"><i class="fa fa-users" aria-hidden="true"></i><span>Usuarios</span><div class="clearfix"></div></a></li>
									
									<li id="menu-academico" ><a href="#"><i class="fas fa-mosque" aria-hidden="true"></i><span>Atractivos Turísticos</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes"><a href="../../create-attractive.php">Crear</a></li>
										   <li id="menu-academico-avaliacoes" ><a href="../../manage-attractives.php">Administrar</a></li>
										  </ul>
										</li>
										<?php if($_SESSION['tipo']==2 || $_SESSION['tipo']==4)
										{?>
										<li id="menu-academico" ><a href="#"><i class="fas fa-archive" aria-hidden="true"></i><span> Paquetes Turísticos</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="../../create-package.php">Crear</a></li>
											<li id="menu-academico-avaliacoes" ><a href="../../manage-packages.php">Administrar</a></li>
										  
										  <li id="menu-academico-avaliacoes" ><a href="../../panel_reservas.php">Reservas</a></li>
										  </ul>
										</li>

										<?php
										}
										
									 if($_SESSION['tipo']==1 || $_SESSION['tipo']==4)
										{?>
										
										
										<li id="menu-academico" ><a href="../../calendario.php"><i class="fas fa-clipboard-list"></i><span>Calendario Festivo</span>
										<div class="clearfix"></div></a>
										</li>
										<li id="menu-academico" ><a href="#"><i class="fa fa-hotel" aria-hidden="true"></i><span>Institución</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes"><a href="#">Hotel</a>
										   <ul id="menu-academico-sub" >
												   <li id="menu-academico-avaliacoes"><a href="../../create-enterprise.php?ie=1" style="width:125px;">Crear</a></li>
												   <li id="menu-academico-avaliacoes"><a href="../../manage-enterprise.php?iid=1" style="width:125px;">Administrar</a></li>
											</ul>
											</li>
										   <li id="menu-academico-avaliacoes" ><a href="#">Agencia Tur.</a>
										   <ul id="menu-academico-sub" >
												   <li id="menu-academico-avaliacoes"><a href="../../create-enterprise.php?ie=2" style="width:125px;">Crear</a></li>
												   <li id="menu-academico-avaliacoes"><a href="../../manage-enterprise.php?iid=2" style="width:125px;">Administrar</a></li>
											</ul>
										</li>
										  </ul>
										</li>
										<li id="menu-academico" ><a href="../../reporte_usuario.php"><i class="fas fa-clipboard-list"></i><span>Reportes</span>
										<div class="clearfix"></div></a>
										</li>
										<li id="menu-academico" ><a href="index.php"><i class="fa fa-save"></i><span>Copia de Seguridad</span>
										<div class="clearfix"></div></a>
										</li>
										<li id="menu-academico" ><a href="../../historial.php"><i class="fa fa-history"></i><span>Historial</span>
										<div class="clearfix"></div></a>
										</li>
										<li id="menu-academico-avaliacoes" ><a href="../../add-post.php"><i class="fas fa-newspaper"></i><span> Noticia</span></a>
										</li>
										<?php
										}?>
								  </ul>
								</div>
							  </div>