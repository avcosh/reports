<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Меню</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           
				
              <li class="nav-item">
                <a href="<?= route_to('dailyreport.index') ?>" class="nav-link <?= (base_url().route_to('dailyreport.index') === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отчет по сделкам менеджеров</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('fot.index') ?>" class="nav-link <?= (base_url().route_to('fot.index') === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отчет ФОТ (Фонд Оплаты Труда)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('fotsupervisor.index') ?>" class="nav-link <?= (base_url().route_to('fotsupervisor.index') === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отчет ФОТ Супервайзер</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= route_to('dealsregion.index') ?>" class="nav-link <?= (base_url().route_to('dealsregion.index') === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отчет Сделки по регионам</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= route_to('refundregion.index') ?>" class="nav-link <?= (base_url().route_to('refundregion.index') === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отчет Возвраты по регионам</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= route_to('refundmanager.index') ?>" class="nav-link <?= (base_url().route_to('refundmanager.index') === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отчет Возвраты по менеджерам</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('workedshifts.index') ?>" class="nav-link <?= (base_url().route_to('workedshifts.index') === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отчет вывод фактически отработанных смен</p>
                </a>
              </li>
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
