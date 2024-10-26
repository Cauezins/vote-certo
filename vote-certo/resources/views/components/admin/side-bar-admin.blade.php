 <!-- Sidebar -->
 <nav class="sidebar d-flex flex-column p-3" id="sidebarMenu">
     <button class="close-btn btn btn-link" id="closeSidebar">✖</button>
     <div class="d-flex flex-wrap justify-content-start my-2">
         <img src="{{ asset('images/system/logo-black-horizontal.svg') }}" alt="Logo System" id='logo-horizontal'>
     </div>

     <hr>
     <h6>Painel Admin</h6>
     <ul class="nav flex-column">
         <li class="nav-item pt-2">
             <a class="nav-link @if ($viewName == 'dashboard') active @endif" href="/admin/dashboard"><i
                     class="bi bi-house-door-fill"></i> Dashboard</a>
         </li>
         @if ($position == 99)
             <li class="nav-item pt-2">
                 <a class="nav-link @if ($viewName == 'users') active @endif" href="/admin/users"><i
                         class="bi bi-people-fill"></i> Usuários</a>
             </li>
         @endif
         <li class="nav-item pt-2">
             <div class="nav-link d-flex justify-content-between @if ($viewName == 'elections') active @endif">
                 <div onclick="document.location.href = '/admin/elections'">
                     <i class="bi bi-archive-fill"></i> Eleiçoes

                 </div>

                 <div id="dropdown-elections">
                     <i class="bi bi-caret-down-fill"></i> <!-- Seta indicando submenu -->
                 </div>

             </div>

         </li>
         <div style="display: none" data-target="#dropdown-elections">
             <ul class="sub-nav">
                @foreach($dataElections as $item)
                 <li class="sub-nav-item pt-2" onclick="document.location.href = '/admin/election/{{$item['id']}}'">
                     <div class="sub-nav-link d-flex justify-content-between @if ($item['id'] == $idElec) active @endif">
                         {{$item['title']}}
                     </div>
                 </li>
                @endforeach
             </ul>
         </div>
         @if ($position == 50 || $position == 99)
             <li class="nav-item pt-2">
                 <a class="nav-link" href="#"><i class="bi bi-person-fill"></i> Suporte</a>
             </li>
         @endif
         @if ($position == 99)
             <li class="nav-item pt-2">
                 <a class="nav-link" href="#"><i class="bi bi-gear-fill"></i> Configurações</a>
             </li>
         @endif
     </ul>
 </nav>
