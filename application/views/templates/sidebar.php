<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside
          id="layout-menu"
          class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <!-- Logo pada aside -->
            <a href="<?= base_url('auth'); ?>" class="app-brand-link">
              <span class="app-brand-logo demo me-1">
                <span style="color: var(--bs-primary)">
                  <svg
                    width="30"
                    height="24"
                    viewBox="0 0 250 196"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z"
                      fill="currentColor" />
                    <path
                      opacity="0.077704"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z"
                      fill="black" />
                    <path
                      opacity="0.077704"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z"
                      fill="black" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z"
                      fill="currentColor" />
                    <path
                      opacity="0.077704"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z"
                      fill="black" />
                    <path
                      opacity="0.077704"
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z"
                      fill="black" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                      fill="currentColor" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                      fill="white"
                      fill-opacity="0.15" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                      fill="currentColor" />
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                      fill="white"
                      fill-opacity="0.3" />
                  </svg>
                </span>
              </span>
              <span class="app-brand-text demo menu-text fw-semibold ms-2"
                >SIDATA</span
              >
            </a>

            <a
              href="javascript:void(0);"
              class="layout-menu-toggle menu-link text-large ms-auto">
              <i
                class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
            </a>
          </div>
          <!-- Side Menu Start -->
          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Query Menu -->
            <?php 
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
            $menu = $this->db->query($queryMenu)->result_array();            
            ?>
             <!-- Looping menu -->
            <?php foreach ($menu as $m) : ?>
            <!-- End -->
            <li class="menu-header fw-medium mt-4">
              <span class="menu-header-text"><?= $m['menu']; ?></span>
            </li>
            <?php
              $menuId = $m['id'];
              $querySubMenu = "SELECT *
                               FROM `user_sub_menu` JOIN `user_menu`
                               ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                               WHERE `user_sub_menu`.`menu_id` = $menuId 
                               AND `user_sub_menu`.`is_active` = 1   
                              ";
              $subMenu = $this->db->query($querySubMenu)->result_array();                
            ?>
            <?php foreach ($subMenu as $sm) :?>
                    <?php if ($title == $sm['title']) : ?>  
            
            <li class="menu-item active">
               <?php else : ?>
                <li class="menu-item">
                  <?php endif ; ?>
             <a href="<?= base_url($sm['url']); ?>" class="menu-link">
                <i class="<?= $sm['icon']; ?>"></i>
                <div data-i18n="Support"><?= $sm['title']; ?></div>
              </a>
            </li>
            <?php endforeach; ?>
          
            <?php endforeach; ?>
            <!-- Misc -->
            <li class="menu-header fw-medium mt-4">
              <span class="menu-header-text">Misc</span>
            </li>
            <li class="menu-item">
              <a
                href="https://buymeacoffee.com/algorithmdev"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-lifebuoy"></i>
                <div data-i18n="Support">Support Me</div>
              </a>
            </li>
            
          </ul>
        </aside>
       