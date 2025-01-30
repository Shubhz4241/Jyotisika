<style>
    body {
        margin: 0;
        padding: 0;
    }


    li {
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    .main {
        width: 100%;
        height: 100vh;
        overflow-y: auto;
        padding-top: 80px;
    }

    #sidebar {
        max-width: 280px;
        min-width: 280px;
        height: 100vh;
        min-height: 100vh;
        transition: all 0.35s ease-in-out;
        background-color: #D4ECFF;
        display: flex;
        flex-direction: column;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        border-right: 1px solid rgba(0, 0, 0, 0.1);
    }

    #sidebar.collapsed {
        margin-left: -280px;
    }

    .toggler-btn {
        background-color: transparent;
        cursor: pointer;
        border: 0;
    }

    .toggler-btn i {
        font-size: 1.75rem;
        color: #333;
        font-weight: 600;
    }


    #sidebar.collapsed~.main .navbar {
        width: 100%;
        left: 0;
        transition: all 0.35s ease-in-out;
    }

    .sidebar-nav {
        flex: 1 1 auto;
        overflow-y: auto;
    }

    .sidebar-logo {
        padding: 1.15rem 1.5rem;
        text-align: center;
        position: relative;
        border-bottom: none;
    }

    .close-sidebar {
        display: none;
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #333;
        font-size: 1.5rem;
        cursor: pointer;
    }

    a.sidebar-link {
        padding: .625rem 1.625rem;
        color: #333;
        position: relative;
        transition: all 0.35s;
        display: block;
        font-size: 1.25rem;
        border: none;
    }

    a.sidebar-link:hover {
        background-color: rgba(0, 0, 0, 0.05);
        color: #000;
    }

    .sidebar-link[data-bs-toggle="collapse"]::after {
        border: solid;
        border-width: 0 .075rem .075rem 0;
        content: "";
        display: inline-block;
        padding: 2px;
        position: absolute;
        right: 1.5rem;
        top: 1.4rem;
        transform: rotate(-135deg);
        transition: all .2s ease-out;
    }

    .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
        transform: rotate(45deg);
        transition: all .2s ease-out;
    }



    /* CUSTOM SCROLLBAR CODE */
    ::-webkit-scrollbar {
        width: 0px;
    }

    .navbar {
        padding: 1.15rem 1.5rem;
        position: fixed;
        width: calc(100% - 280px);
        z-index: 1000;
        top: 0;
        background-color: var(--white);
        box-shadow: 10px 3px 10px rgba(0, 0, 0, 0.1);
        height: 10%;
        margin-bottom: 12px;
        left: 280px;
        transition: all 0.35s ease-in-out;
    }

    #notificationModal .modal-body {
        max-height: 450px;
        overflow-y: auto;
    }


    @media (max-width:768px) {
        #sidebar {
            background-color: #D4ECFF;
            /* Solid color for mobile devices */
            position: fixed;
            z-index: 1100;
            left: 0;
            top: 0;
        }

        .sidebar-toggle {
            margin-left: -280px;
        }

        #sidebar.collapsed {
            margin-left: 0;
        }

        .close-sidebar {
            display: block;
        }

        .navbar {
            height: 9%;
            width: 100%;
            left: 0;
        }
    }
</style>

<aside id="sidebar" class="sidebar-toggle">
    <div class="sidebar-logo ">
        <i class="bi bi-x-lg close-sidebar mt-3"></i>
    </div>
    <!-- Sidebar Navigation -->
    <ul class="sidebar-nav p-0">
        <!-- Profile Image & Name -->
        <li class="sidebar-item text-center mb-4 ">
            <a href="<?php echo base_url() . 'ManasviProfile'; ?>">
                <img src="<?php echo base_url() . 'assets\images\Admin logo.png'; ?>" alt="HR Profile"
                    class="rounded-circle mb-2" style="width: 160px; height: 140px;">
            </a>
            <!-- <h6 class="text-dark mb-3">HR Manager</h6> -->
            <div class="d-flex justify-content-center gap-2">
                <!-- <a href="<?php echo base_url() . 'ManasviHome'; ?>" class="btn btn-primary rounded-1 " style="font-size: 16px;">Manasvi</a> -->
                <!-- <a href="<?php echo base_url() . 'EaglebyteHome'; ?>" class="btn btn-outline-primary px-3 rounded-1" style="font-size: 16px;">Eaglebyte</a> -->
            </div>
        </li>

        <!-- HOME -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'admindash'; ?>" class="sidebar-link " id="ManasviHome-link" style="font-size: 16px;">
                <i class="bi bi-house-fill"></i>
                <span class="ms-1">Dashboard</span>
            </a>
        </li>

        <!-- PEOPLE -->
        <!-- <li class="sidebar-item">
            <a href="#" class="sidebar-link dropdown-toggle collapsed" id="people-dropdown" data-bs-toggle="collapse"
                data-bs-target="#peopleSubmenu" aria-expanded="false" style="font-size: 16px;">
                <i class="bi bi-people-fill"></i>
                <span class="ms-1">People</span>
            </a>
            <div class="collapse" id="peopleSubmenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviTotalEmployee'; ?>" class="sidebar-link" id="TotalEmployee-link" style="font-size: 16px;">
                            <i class="bi bi-person-workspace"></i>
                            <span class="ms-1">Total Employees</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviTotalIntern'; ?>" class="sidebar-link" id="TotalIntern-link" style="font-size: 16px;">
                            <i class="bi bi-mortarboard-fill"></i>
                            <span class="ms-1"> Total Interns</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> -->

        <!-- ATTENDANCE MANAGEMENT -->
        <!-- <li class="sidebar-item">
            <a href="#" class="sidebar-link dropdown-toggle collapsed" id="attendance-dropdown"
                data-bs-toggle="collapse" data-bs-target="#attendanceSubmenu" aria-expanded="false" style="font-size: 16px;">
                <i class="bi bi-clipboard-check-fill"></i>
                <span class="ms-1">Attendance Management</span>
            </a>
            <div class="collapse" id="attendanceSubmenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviEmployeeAttendance'; ?>" class="sidebar-link"
                            id="EmployeeAttendance-link" style="font-size: 16px;">
                            <i class="bi bi-person-check-fill"></i>
                            <span class="ms-1">Daily Employee Attendance</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviInternAttendance'; ?>" class="sidebar-link"
                            id="InternAttendance-link" style="font-size: 16px;">
                            <i class="bi bi-person-check-fill"></i>
                            <span class="ms-1">Daily Interns Attendance</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviGenerateAttendance'; ?>" class="sidebar-link"
                            id="GenerateAttendance-link" style="font-size: 16px;">
                            <i class="bi bi-file-text-fill"></i>
                            <span class="ms-1">Generate Attendance Report</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> -->

        <!-- LEAVE MANAGEMENT -->
        <!-- <li class="sidebar-item">
            <a href="#" class="sidebar-link dropdown-toggle collapsed" id="leave-dropdown" data-bs-toggle="collapse"
                data-bs-target="#leaveSubmenu" aria-expanded="false" style="font-size: 16px;">
                <i class="bi bi-calendar-minus-fill"></i>
                <span class="ms-1">Leave Management</span>
            </a>
            <div class="collapse" id="leaveSubmenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviEmployeeLeaveRequest'; ?>" class="sidebar-link"
                            id="EmployeeLeaveRequest-link" style="font-size: 16px;">
                            <i class="bi bi-send-fill"></i>
                            <span class="ms-1">Employee Leave Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviInternLeaveRequest'; ?>" class="sidebar-link" id="InternLeaveRequest-link" style="font-size: 16px;">
                            <i class="bi bi-send-fill"></i>
                            <span class="ms-1">Intern Leave Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'ManasviLeaveRecords'; ?>" class="sidebar-link" id="leaveRecords-link" style="font-size: 16px;">
                            <i class="bi bi-key-fill"></i>
                            <span class="ms-1">Leave Access</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li> -->

        <!-- User Management -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'usermanagement'; ?>" class="sidebar-link" id="ManasviSalaryManagement-link" style="font-size: 16px;">
                <i class="bi bi-person-vcard"></i>
                <span class="ms-1">User Management</span>
            </a>
        </li>

        <!-- Service Management -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'ManasviDocumentation'; ?>" class="sidebar-link dropdown-toggle collapsed" id="people-dropdown" data-bs-toggle="collapse"
                data-bs-target="#peopleSubmenu" aria-expanded="false" style="font-size: 16px;">
                <i class="bi bi-clipboard-check"></i>
                <span class="ms-1">Service Management</span>
            </a>
            <div class="collapse" id="peopleSubmenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'festivals'; ?>" class="sidebar-link" id="TotalEmployee-link" style="font-size: 16px;">
                            <!-- <i class="bi bi-person-workspace"></i> -->
                            <span class="ms-1">Festivals</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'poojalist'; ?>" class="sidebar-link" id="TotalIntern-link" style="font-size: 16px;">
                            <!-- <i class="bi bi-mortarboard-fill"></i> -->
                            <span class="ms-1"> Puja</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url() . 'jyotisikastore'; ?>" class="sidebar-link" id="TotalIntern-link" style="font-size: 16px;">
                            <!-- <i class="bi bi-mortarboard-fill"></i> -->
                            <span class="ms-1"> Jyotisika Store</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- MANAGE EVENT -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'anyliticsandreports'; ?>" class="sidebar-link" id="Manageevent-link" style="font-size: 16px;">
                <i class="bi bi-file-bar-graph"></i>
                <span class="ms-1">Analytics & Reports</span>
            </a>
        </li>

        <!-- INTERVIEW ANALYSIS -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'profile'; ?>" class="sidebar-link" id="InterviewAnalysis-link" style="font-size: 16px;">
                <i class="bi bi-person-circle"></i>
                <span class="ms-1">Profile</span>
            </a>
        </li>

    </ul>
    <!-- Sidebar Navigation Ends -->

    <!-- LOGOUT -->
    <div class="sidebar-footer mb-3">
        <a href="<?php echo base_url() . 'login'; ?>" class="sidebar-link" style="font-size: 16px;">
            <i class="bi bi-box-arrow-left"></i>
            <span class="ms-1">Logout</span>
        </a>
    </div>

</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const links = {
            'ManasviHome': document.getElementById('ManasviHome-link'),
            'ManasviTotalEmployee': document.getElementById('TotalEmployee-link'),
            'ManasviTotalIntern': document.getElementById('TotalIntern-link'),
            'ManasviEmployeeAttendance': document.getElementById('EmployeeAttendance-link'),
            'ManasviInternAttendance': document.getElementById('InternAttendance-link'),
            'ManasviGenerateAttendance': document.getElementById('GenerateAttendance-link'),
            'ManasviEmployeeLeaveRequest': document.getElementById('EmployeeLeaveRequest-link'),
            'ManasviInternLeaveRequest': document.getElementById('InternLeaveRequest-link'),
            'ManasviLeaveRecords': document.getElementById('leaveRecords-link'),
            'ManasviSalaryManagement': document.getElementById('ManasviSalaryManagement-link'),
            'ManasviDocumentation': document.getElementById('ManasviDocumentation-link'),
            'ManasviManageEvent': document.getElementById('Manageevent-link'),
            'ManasviInterviewAnalysis': document.getElementById('InterviewAnalysis-link')
        };

        const currentPage = currentPath.split('/').pop();

        for (const [path, link] of Object.entries(links)) {
            if (currentPage === path) {
                link.style.backgroundColor = '#007AFF';
                link.style.color = '#FFFFFF';
                const parentCollapse = link.closest('.collapse');
                if (parentCollapse) {
                    parentCollapse.classList.add('show');
                    const trigger = document.querySelector(`[data-bs-target="#${parentCollapse.id}"]`);
                    trigger.classList.remove('collapsed');
                    trigger.setAttribute('aria-expanded', 'true');
                }
                break;
            }
        }
    });
</script>