<nav class="navbar navbar-expand d-flex justify-content-between align-items-center">
    <button class="toggler-btn" type="button">
        <i class="bi bi-list"></i>
    </button>

    <!-- Notification Icon with Badge -->
    <div class="notificationIcon position-relative"  onclick="openNotificationModal()">
        <i class="bi bi-bell-fill fs-5"></i>
        <!-- Badge for Unread Notifications -->
        <span id="notificationBadge"
            class="badge bg-danger position-absolute top-0 start-100 translate-middle p-1 rounded-circle">0</span>
    </div>
</nav>

<!-- Notification Modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable notification-modal">
        <div class="modal-content " style="margin-top: 100px;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
                <div class="notification-count">2 New</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-2">
                <div class="notification-list">
                    <div class="notification-item unread">
                        <div class="notification-icon bg-primary text-white">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <div class="notification-content">
                            <h6>Upcoming Interview</h6>
                            <p>Interview scheduled with ABC College on 25th December 2023</p>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                        <div class="notification-badge"></div>
                    </div>
                    <div class="notification-item unread">
                        <div class="notification-icon bg-success text-white">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="notification-content">
                            <h6>Student Selected</h6>
                            <p>John Doe selected for PHP Developer role</p>
                            <small class="text-muted">1 day ago</small>
                        </div>
                        <div class="notification-badge"></div>
                    </div>
                    <div class="notification-item">
                        <div class="notification-icon bg-warning text-white">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="notification-content">
                            <h6>Reminder</h6>
                            <p>Team meeting scheduled at 2 PM</p>
                            <small class="text-muted">3 days ago</small>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="notification-icon bg-warning text-white">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="notification-content">
                            <h6>Reminder</h6>
                            <p>Team meeting scheduled at 2 PM</p>
                            <small class="text-muted">3 days ago</small>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="notification-icon bg-warning text-white">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="notification-content">
                            <h6>Reminder</h6>
                            <p>Team meeting scheduled at 2 PM</p>
                            <small class="text-muted">3 days ago</small>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="notification-icon bg-warning text-white">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="notification-content">
                            <h6>Reminder</h6>
                            <p>Team meeting scheduled at 2 PM</p>
                            <small class="text-muted">3 days ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-link text-primary" data-bs-dismiss="modal">Mark All as Read</button>
            </div>
        </div>
    </div>
    
</div>


<script>
    function openNotificationModal() {
        var notificationModal = new bootstrap.Modal(document.getElementById('notificationModal'), {
            backdrop: false
        });
        notificationModal.show();
    }
</script>



<style>
    /* Header styles */
    .navbar {
        background-color: #D4ECFF;
        border-bottom: 1px solid #e1e1e1;
    }

    .navbar-nav .nav-link {
        color: #000;
        font-weight: 500;
        margin-right: 20px;
        font-size: 16px;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link.active {
        border-bottom: 2px solid #253D90;
        color: #000;
    }

    .navbar-nav .nav-link:hover {
        color: #253D90;
        border-bottom: 2px solid #253D90;
    }

    .navbar .bi-bell {
        font-size: 1.5rem;
        cursor: pointer;
    }

    .navbar img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border: 2px solid #253D90;
    }

    .notification-modal {
        position: absolute;
        top: auto;
        right: 20px;
        bottom: 80px;
        width: 350px;
        max-width: 100%;
    }

    .notification-modal .modal-content {
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .notification-modal .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
    }

    /* Consistent notification count styling */
    .notification-count {
        background-color: #253D90;
        color: white;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        line-height: 1;
        display: inline-block;
        font-weight: 500;
    }

    /* Modal header notification count */
    .modal .notification-count {
        margin-left: auto;
    }

    /* Navbar notification count */
    .navbar .notification-count {
        position: absolute;
        top: -3px;
        right: -8px;
        padding: 2px 6px;
        font-size: 0.7rem;
        min-width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid white;
    }

    .navbar .bi-bell {
        position: relative;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .notification-list {
        max-height: 350px;
        overflow-y: auto;
    }

    .notification-item {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        border-bottom: 1px solid #f0f0f0;
        position: relative;
        transition: background-color 0.3s ease;
    }

    .notification-item:hover {
        background-color: #f8f9fa;
    }

    .notification-item.unread {
        background-color: #f0f4ff;
    }

    .notification-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .notification-badge {
        width: 8px;
        height: 8px;
        background-color: #253D90;
        border-radius: 50%;
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .notification-content {
        flex-grow: 1;
    }

    .notification-content h6 {
        margin-bottom: 4px;
        font-size: 0.95rem;
        color: #333;
        font-weight: 600;
    }

    .notification-content p {
        margin-bottom: 4px;
        color: #666;
        font-size: 0.85rem;
        line-height: 1.4;
    }

    .notification-content small {
        font-size: 0.75rem;
        color: #999;
    }

    .notification-modal .modal-footer {
        justify-content: center;
    }

    .notification-modal .btn-link {
        text-decoration: none;
        font-weight: 500;
    }
    @media (max-width:768px) {
        .navbar{
            background-color: #ffffff;
        }
    }
</style>