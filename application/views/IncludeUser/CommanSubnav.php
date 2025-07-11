<style>
    .btnHover:hover {
        background-color: var(--yellow) !important;
        color: black !important;
    }
</style>

<style>
    /* existing styles … */

    /* make the services bar behave like the top bar */
    #astrologer-services-list {


        display: flex;
        flex-wrap: nowrap;
        /* keep everything on one line */
        gap: .75rem;
        /* same as Bootstrap gap‑3 */
        overflow-x: auto;
        white-space: nowrap;
        /* prevent anchors from wrapping */
        list-style: none;
        /* get rid of bullets */
        padding: 0;
        /* zero out default ul padding */
        margin: 0;

        scrollbar-width: none;
        /* hide Firefox scrollbar */
        -ms-overflow-style: none;
        /* hide old IE scrollbar */
    }

    #astrologer-services-list::-webkit-scrollbar {
        display: none;
    }

    /* hide WebKit scrollbar */
</style>


<!-- BUTTONS -->
<div class="container-fluid my-4"
    style="max-height: 800px; width: 100%; overflow-x: auto; white-space: nowrap; scrollbar-width: none; -ms-overflow-style: none; padding-left: 10px;">
    <div class="row  justify-content-md-center gap-3 px-1" style="display: flex; flex-wrap: nowrap;">

        <a href="<?php echo base_url('freekundli'); ?>" id="freekundli-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">

            <?php
            echo $this->lang->line('freekundali') ? $this->lang->line('freekundali') : 'Free Kundali'; ?>

        </a>
        <a href="<?php echo base_url('kundlimatching'); ?>" id="kundlimatching-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">
            <?php echo $this->lang->line('kundlimatching') ? $this->lang->line('kundlimatching') : 'Kundli Matching'; ?>
        </a>

        <a href="<?php echo base_url('todayhoroscope'); ?>" id="horo-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">
            <?php echo $this->lang->line('Horoscope') ? $this->lang->line('Horoscope') : 'Horoscope'; ?>
        </a>

        <a href="<?php echo base_url('jyotisikamall'); ?>" id="jyotisikamall-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">
            <?php echo $this->lang->line('jyotisikamall') ? $this->lang->line('jyotisikamall') : 'Jyotisika Mall'; ?>
        </a>


        <a href="<?php echo base_url('panchang'); ?>" id="panchang-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">
            <?php echo $this->lang->line('panchang') ? $this->lang->line('panchang') : 'Panchang'; ?>
        </a>
        <a href="<?php echo base_url('kp'); ?>" id="kp-link" class="btnHover btn btn-outline-dark rounded-4 shadow-sm"
            style="width: fit-content;">
            <?php echo $this->lang->line('kp') ? $this->lang->line('kp') : 'KP'; ?>
        </a>
        <a href="<?php echo base_url('festival'); ?>" id="festival-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">
            <?php echo $this->lang->line('festival') ? $this->lang->line('festival') : 'Festival'; ?>
        </a>

        <a href="<?php echo base_url('bookpooja'); ?>" id="bookpooja-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">
            <?php
            echo $this->lang->line('bookpuja') ? $this->lang->line('bookpuja') : 'Book Puja';
            ?>



        </a>



        <a href="<?php echo base_url('MobPooja'); ?>" id="MobPooja-link"
            class="btnHover btn btn-outline-dark rounded-4 shadow-sm" style="width: fit-content;">
            <?php echo $this->lang->line('MobPooja') ? $this->lang->line('MobPooja') : 'Mob Pooja'; ?>
        </a>


    </div>

    <!-- Astrologer services (API‑filled) -->
    <!-- Astrologer services -->
    <div class="row justify-content-center mt-4 px-1">

        <ul id="astrologer-services-list" class="d-flex flex-wrap justify-content-center gap-3 list-unstyled m-0 p-0">
            <!-- JS injects anchors here -->
        </ul>
    </div>


</div>

<script>
    fetch("<?php echo base_url('User_Api_Controller/showservices_limited'); ?>")
        .then(r => r.json())
        .then(data => {
            const list = document.getElementById("astrologer-services-list");
            if (!list) return;

            const baseUrl = "<?php echo base_url('User/astrolgerservices/'); ?>";

            if (data.status === "success" && data.data.length) {
                list.innerHTML = data.data.map(s => `
        <a href="${baseUrl}${s.id}" 
           class="btnHover btn btn-outline-dark rounded-4 shadow-sm m-2" 
           style="width: fit-content;">
            ${s.name}
        </a>
    `).join('');
            }
            else {
                list.innerHTML = "<span class='text-muted'>No astrologer services available.</span>";
            }
        })
        .catch(err => {
            console.error(err);
            const list = document.getElementById("astrologer-services-list");
            if (list) list.innerHTML = "<span class='text-danger'>Failed to load astrologer services.</span>";
        });

</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentPath = window.location.pathname;
        const links = {
            'horo': document.getElementById('horo-link'),
            'bookpooja': document.getElementById('bookpooja-link'),
            'freekundli': document.getElementById('freekundli-link'),
            'kundlimatching': document.getElementById('kundlimatching-link'),
            'festival': document.getElementById('festival-link'),
            'panchang': document.getElementById('panchang-link'),
            'jyotisikamall': document.getElementById('jyotisikamall-link'),
            'kp': document.getElementById('kp-link'),
            'MobPooja': document.getElementById('MobPooja-link')




        };

        const currentPage = currentPath.split('/').pop();

        for (const [path, link] of Object.entries(links)) {
            if (currentPage === path) {
                link.style.backgroundColor = 'var(--yellow)';
                link.style.color = 'black';
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