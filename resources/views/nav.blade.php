<style>
aside.main-sidebar {
    background: none !important;
}


    

.main-header .navbar {
    background-color:  !important;
    /*#2e2b3c color */
}
</style>
<aside class="main-sidebar" >
    <style>
        @media screen and (min-width: 768px) {
            .cacher{
                display:none;
            }
        }
        
    </style>
    
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" id="barc">
        <!-- Sidebar user panel -->
   

      
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
           
            
           
            

                  
            <li> 
                <a href="#">
                    
                    <i class="fa fa-users"></i>
                    <span  class="header">Visiteurs</span>
                    <i class="fa fa-angle-left fa-pull-right" style="  float: right;" ></i>
                </a>
                  <ul class="sidebar-submenu" style="list-style: none; display: none;">
                   
                    <li class=""><a href="{{url('patient/create')}}" style="font-weight: 100;">
                        <i class="fa fa-list-alt" style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i><span>{{'Ajouter'}}</span> </a>
                    </li>
                    <li class=""><a href="{{url('/patient')}}">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Liste')}}</span></a>
                    </li>
                    
                    <li class=""><a href="{{url('/paiement/ajout')}}">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Paiement')}}</span></a>
                    </li> 
                    
                    <li class=""><a href="{{url('/historique')}}">
                        <i class="fa fa-archive"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Historique')}}</span></a>
                    </li> 
                   
                  </ul>
                
            </li>


            <li> 
                <a href="#">
                    <i class="fa fa-puzzle-piece"></i>
                    <span  class="header">Medecins</span>
                    <i class="fa fa-angle-left fa-pull-right" style="  float: right;" ></i>
                </a>
                  <ul class="sidebar-submenu" style="list-style: none; display: none;">
                   
                    <li class=""><a href="{{url('medecin/create')}}" style="font-weight: 100;">
                        <i class="fa fa-list-alt" style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i><span>{{'Nouveau'}}</span> </a>
                    </li>
                    <li class=""><a href="{{url('/medecin')}}">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Liste')}}</span></a>
                    </li>
                    
                    <li class=""><a href="{{url('/specialite')}}">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Spécialités')}}</span></a>
                    </li>

                    <li class=""><a href="#">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Disponibilité')}}</span></a>
                    </li>
                  
                   
                  </ul>
                
            </li>

            <li> 
                <a href="#">
                    <i class="fa fa-puzzle-piece"></i>
                    <span  class="header">Rendez Vous</span>
                    <i class="fa fa-angle-left fa-pull-right" style="  float: right;" ></i>
                </a>
                  <ul class="sidebar-submenu" style="list-style: none; display: none;">
                   
                    <li class=""><a href="{{url('rendezV/ajout')}}" style="font-weight: 100;">
                        <i class="fa fa-list-alt" style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i><span>{{'ajouter'}}</span> </a>
                    </li>
                    <li class=""><a href="{{url('rendezV')}}">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Liste')}}</span></a>
                    </li>

                    <li class=""><a href="{{url('/historiqueRV')}}">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Historique des rendez-vous')}}</span></a>
                    </li> 
                    
                  </ul>
                
            </li>


            <li> 
                <a href="#">
                    <i class="fa fa-puzzle-piece"></i>
                    <span  class="header">Traitement</span>
                    <i class="fa fa-angle-left fa-pull-right" style="  float: right;" ></i>
                </a>
                  <ul class="sidebar-submenu" style="list-style: none; display: none;">
                   
                    <li class=""><a href="{{url('/traitement')}}" style="font-weight: 100;">
                        <i class="fa fa-list-alt" style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i><span>{{'liste'}}</span> </a>
                    </li>
                    <li class=""><a href="#">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Situation du jour')}}</span></a>
                    </li>
                  
                   
                  </ul>
                
            </li>

            
            <li> 
                <a href="#">
                    <i class="fa fa-puzzle-piece"></i>
                    <span  class="header">Rapport</span>
                    <i class="fa fa-angle-left fa-pull-right" style="  float: right;" ></i>
                </a>
                  <ul class="sidebar-submenu" style="list-style: none; display: none;">
                   
                    <li class=""><a href="/Statistic/Static" style="font-weight: 100;">
                        <i class="fa fa-list-alt" style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i><span>{{'Mansuel'}}</span> </a>
                    </li>
                    <li class=""><a href="#">
                        <i class="fa fa-puzzle-piece"style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i> <span>{{trans('Annuel')}}</span></a>
                    </li>
                  
                    
                   
                  </ul>
                
            </li>

         <li> 
               
         
                    <li class=""><a href="#" style="font-weight: 100;">
                        <i class="fa fa-user" style="font-size: 13px;width: 30px; height: 30px; border-radius: 50%; line-height: 30px; 
                            margin-right: 7px;color: #FFFFFF;text-align: center; background: #38354a;">
                        </i>{{ trans('Profile') }} </a>
                        
                    </li>
                   
                
            </li>




        </ul>

      
            

        
            
            <li class="">
                               
                 <a href="#"  onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                         <i class="fa fa-power-off"></i> <span>{{trans('Se déconnecter')}}</span></a>
                                    

                <form id="logout-form" action="#" method="POST">
                                        @csrf
                 </form>
                                
             </li>
          
            
            <li class="">
              <form id="logout-form" action="#" method="POST" >
                                        @csrf
              </form>
            </li>



    </section>
    <!-- /.sidebar -->
</aside>

    </script>