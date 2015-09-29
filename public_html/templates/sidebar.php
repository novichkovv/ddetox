<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php foreach($sidebar as $k => $v): ?>
                <li>
                    <?php if(!$v['children']): ?>
                        <a href="<?php echo ($v['external'] ? '' : SITE_DIR ) . ($v['route'] ? $v['route'] .'/' : '') ; ?>">
                    <?php endif; ?>
                    <?php if($v['children']): ?>
                        <a href="#">
                    <?php endif; ?>
                        <i class="<?php echo $v['icon']; ?>"></i>
                        <span class="title"><?php echo $v['title']; ?></span>
                    </a>
                    <?php if($v['children']): ?>
                        <ul class="sub-menu">
                            <?php foreach($v['children'] as $child): ?>
                            <li>
                                <a href="<?php echo SITE_DIR . $child['route']; ?>/">
                                    <i class="<?php echo $child['icon']; ?>"></i>
                                    <?php echo $child['title']; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
<!--            <li class="start ">-->
<!--                <a href="--><?php //echo SITE_DIR; ?><!--">-->
<!--                    <i class="icon-home"></i>-->
<!--                    <span class="title">Tableau de bord</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="javascript:;">-->
<!--                    <i class="icon-users"></i>-->
<!--                    <span class="title">Commandes</span>-->
<!--                    <span class="selected"></span>-->
<!--                    <span class="arrow open"></span>-->
<!--                </a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--orders/">-->
<!--                            <i class="icon-list"></i>-->
<!--                            Voir les commandes-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--orders/add/">-->
<!--                            <i class="icon-plus"></i>-->
<!--                            Créer une commande-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="javascript:;">-->
<!--                    <i class="icon-users"></i>-->
<!--                    <span class="title">Clients</span>-->
<!--                    <span class="selected"></span>-->
<!--                    <span class="arrow open"></span>-->
<!--                </a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--clients/">-->
<!--                            <i class="icon-list"></i>-->
<!--                            Liste des clients-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--clients/add/">-->
<!--                            <i class="icon-user-follow"></i>-->
<!--                            Ajouter un client-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--contacts/">-->
<!--                            <i class="icon-list"></i>-->
<!--                            Liste des contacts-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--contacts/add/">-->
<!--                            <i class=" icon-note  "></i>-->
<!--                            Ajouter un contact-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <a href="javascript:;">-->
<!--                    <i class="icon-note "></i>-->
<!--                    <span class="title">Traducteurs</span>-->
<!--                    <span class="selected"></span>-->
<!--                    <span class="arrow open"></span>-->
<!--                </a>-->
<!--                <ul class="sub-menu">-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--translators/">-->
<!--                            <i class="icon-list"></i>-->
<!--                            Liste des traducteurs-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--translators/add/">-->
<!--                            <i class="icon-note "></i>-->
<!--                            Ajouter un traducteur-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="--><?php //echo SITE_DIR; ?><!--search/">-->
<!--                            <i class="icon-list"></i>-->
<!--                            Afficher selon...-->
<!--                        </a>-->
<!--                    </li>-->
<!---->
<!---->
<!--                </ul>-->
<!--            </li>-->
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>