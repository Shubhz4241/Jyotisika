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
        background-color: #0c768a;
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
            background-color: #0c768a;
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
            <a href="<?php echo base_url() . 'admindash'; ?>">
                <img src="<?php echo base_url() . 'assets\images\Admin logo.png'; ?>" alt="HR Profile"
                    class="rounded-circle mb-2" style="width: 160px; height: 140px;    filter: drop-shadow(0 0 8px rgba(234, 239, 44, 1));">
            </a>
            <!-- <h6 class="text-dark mb-3">HR Manager</h6> -->
            <div class="d-flex justify-content-center gap-2">
                <!-- <a href="<?php echo base_url() . 'ManasviHome'; ?>" class="btn btn-primary rounded-1 " style="font-size: 16px;">Manasvi</a> -->
                <!-- <a href="<?php echo base_url() . 'EaglebyteHome'; ?>" class="btn btn-outline-primary px-3 rounded-1" style="font-size: 16px;">Eaglebyte</a> -->
            </div>
        </li>

        <!-- HOME -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'dashboard'; ?>" class="sidebar-link " id="ManasviHome-link" style="font-size: 16px;">
                <i class="bi bi-house-fill" style="color: white;"></i>
                <span class="ms-1" style="color: white;">Dashboard</span>
            </a>
        </li>

        <!-- User Management -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'allastrologer'; ?>" class="sidebar-link" id="ManasviSalaryManagement-link" style="font-size: 16px;">
                <i class="bi bi-person-vcard" style="color: white;"></i>
                <span class="ms-1" style="color: white;">Astrologer</span>
            </a>
        </li>

        <!-- Orders -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'allpoojaris'; ?>" class="sidebar-link" id="ManasviSalaryManagement-link" style="font-size: 16px;">
                <i class="bi bi-bag-dash" style="color: white;"></i>
                <span class="ms-1" style="color: white;">Pujaris</span>
            </a>
        </li>

        <!-- Track and Ship -->
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'products'; ?>" class="sidebar-link" id="ManasviSalaryManagement-link" style="font-size: 16px;">
                <i class="bi bi-truck" style="color: white;"></i>
                <span class="ms-1" style="color: white;">Products</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'orders'; ?>" class="sidebar-link" id="ManasviSalaryManagement-link" style="font-size: 16px;">
            <i class="bi bi-clipboard-check " style="color: white;"></i>
                <span class="ms-1" style="color: white;">Orders</span>
            </a>
        </li>

       
        <li class="sidebar-item">
            <a href="<?php echo base_url() . 'profile'; ?>" class="sidebar-link" id="InterviewAnalysis-link" style="font-size: 16px;">
                <i class="bi bi-person-circle" style="color: white;"></i>
                <span class="ms-1" style="color: white;">Profile</span>
            </a>
        </li>

    </ul>
    <!-- Sidebar Navigation Ends -->

    <!-- LOGOUT -->
    <div class="sidebar-footer mb-3">
        <a href="<?php echo base_url() . 'login'; ?>" class="sidebar-link" style="font-size: 16px;">
            <i class="bi bi-box-arrow-left" style="color: white;"></i>
            <span class="ms-1" style="color: white;">Logout</span>
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