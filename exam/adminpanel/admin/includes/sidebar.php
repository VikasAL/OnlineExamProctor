   <div class="app-sidebar sidebar-shadow">
       <div class="app-header__logo">
           <div class="header__pane ml-auto">
               <div>
                   <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                       data-class="closed-sidebar">
                       <span class="hamburger-box">
                           <span class="hamburger-inner"></span>
                       </span>
                   </button>
               </div>
           </div>
       </div>
       <div class="app-header__mobile-menu">
           <div>
               <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                   <span class="hamburger-box">
                       <span class="hamburger-inner"></span>
                   </span>
               </button>
           </div>
       </div>
       <div class="app-header__menu">
           <span>
               <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                   <span class="btn-icon-wrapper">
                       <i class="fa fa-ellipsis-v fa-w-6"></i>
                   </span>
               </button>
           </span>
       </div>
       <div class="scrollbar-sidebar">
           <div class="app-sidebar__inner">
               <ul class="vertical-nav-menu">
                   <li class="app-sidebar__heading"><a href="home.php"> <i class="h6 font-weight-bold text-left"> DASHBOARD </i></a></li>
                   <li class="app-sidebar__heading">MANAGE COURSE</li>
                   <li>
                       <a href="#">
                           <i class="metismenu-icon material-icons">assignment</i>
                           Course
                           <i class="metismenu-state-icon material-icons">
                               keyboard_arrow_down
                           </i>
                       </a>
                       <ul>
                           <li>
                               <a href="#" data-toggle="modal" data-target="#modalForAddCourse">
                                   <span class="material-icons mr-1">
                                       add
                                   </span>
                                   Add Course
                               </a>
                           </li>
                           <li>
                               <a href="home.php?page=manage-course">
                                   <span class="material-icons mr-2">
                                       settings_suggest
                                   </span>Manage Course
                               </a>
                           </li>

                       </ul>
                   </li>

                   <li class="app-sidebar__heading">MANAGE EXAM</li>
                   <li>
                       <a href="#">
                           <i class="metismenu-icon material-icons">
                               post_add
                           </i>
                           Exam
                           <i class="metismenu-state-icon material-icons">
                               keyboard_arrow_down
                           </i>
                       </a>
                       <ul>
                           <li>
                               <a href="#" data-toggle="modal" data-target="#modalForExam">
                                   <span class="material-icons mr-1">
                                       add
                                   </span>
                                   Add Exam
                               </a>
                           </li>
                           <li>
                               <a href="home.php?page=manage-exam">
                                   <span class="material-icons mr-2">
                                       settings_suggest
                                   </span>Manage Exam
                               </a>
                           </li>

                       </ul>
                   </li>
                   <li class="app-sidebar__heading">MANAGE EXAMINEE</li>
                   <li>
                       <a href="#">
                           <i class="metismenu-icon material-icons">
                               person_add
                           </i>
                           Examinee
                           <i class="metismenu-state-icon material-icons">
                               keyboard_arrow_down
                           </i>
                       </a>
                       <ul>
                           <li>
                               <a href="" data-toggle="modal" data-target="#modalForAddExaminee">
                                   <span class="material-icons mr-1">
                                       add
                                   </span>
                                   </i>Add Examinee
                               </a>
                           </li>
                           <li>
                               <a href="home.php?page=manage-examinee">
                                   <span class="material-icons mr-2">
                                       settings_suggest
                                   </span>Manage Examinee
                               </a>
                           </li>

                       </ul>
                   </li>

                   <li class="app-sidebar__heading">RANKING</li>
                   <li>
                       <a href="home.php?page=ranking-exam">
                           <i class="metismenu-icon material-icons mr-2">
                               leaderboard
                           </i>Ranking By Exam
                       </a>
                   </li>


                   <li class="app-sidebar__heading">REPORTS</li>
                   <li>
                       <a href="home.php?page=examinee-result">
                           <i class="metismenu-icon material-icons mr-2">
                               format_list_numbered_rtl
                           </i>Examinee Result
                       </a>
                   </li>


                   <li class="app-sidebar__heading">FEEDBACKS</li>
                   <li>
                       <a href="home.php?page=feedbacks">
                           <i class="metismenu-icon material-icons mr-2">
                               feedback
                           </i>All Feedbacks
                       </a>
                   </li>

               </ul>
           </div>
       </div>
   </div>