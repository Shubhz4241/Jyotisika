 <style>
     .btnHover:hover {
         background-color: var(--yellow) !important;
         color: black !important;
     }
 </style>

 <!-- BUTTONS -->
 <div class="container-fluid my-4" style="max-height: 800px; width: 100%; overflow-x: auto; white-space: nowrap; scrollbar-width: none; -ms-overflow-style: none; padding-left: 10px;">
     <div class="row  justify-content-md-center gap-3 px-1" style="display: flex; flex-wrap: nowrap;">
         <a href="<?php echo base_url('bookpooja'); ?>" id="bookpooja-link" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
             Book Pooja
         </a>
         <a href="<?php echo base_url('freekundli'); ?>" id="freekundli-link" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
             Free Kundli
         </a>
         <a href="<?php echo base_url('kundlimatching'); ?>" id="kundlimatching-link" class=" btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
             Kundli Matching
         </a>
         <a href="" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
             Jyotisika Mall
         </a>
         <a href="#" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
             Panchang
         </a>
         <a href="#" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
             KP
         </a>
         <a href="<?php echo base_url('festival'); ?>" id="festival-link" class="btnHover btn btn-outline-dark rounded-4 shadow" style="width: fit-content;">
             Festival
         </a>
     </div>
 </div>




 <script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const links = {
            'bookpooja': document.getElementById('bookpooja-link'),
            'freekundli': document.getElementById('freekundli-link'),
            'kundlimatching': document.getElementById('kundlimatching-link'),
            'festival': document.getElementById('festival-link'),

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