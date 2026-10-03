<section class="container hero-section">
    <div class="crane-image-container">
        <img src="../images/container_img.png"
             alt="Industrial Crane"
             class="crane-img">
    </div>

    <div class="hero-composition">

        <h1 class="huge-title huge-title-solid">
            BUILD TO CARRY
        </h1>

        <!-- <h1 class="huge-title huge-title-cutout">
            BUILD TO CARRY
        </h1>

        <h1 class="huge-title huge-title-hollow">
            BUILD TO CARRY
        </h1> -->

        <div class="hero-details">
            <p class="lead">
                FreightConnect connects freight forwarders, <br>exporters,
                and importers to build trusted <br>global business relationships.
            </p>

            <div class="d-flex justify-content-between hero-buttons">
                <a href="#supplier"
                   class="btn btn-primary"
                   data-bs-toggle="modal"
                   data-bs-target="#buyerSupplierModal">
                    Looking for a Supplier / Buyer?
                </a>

                <a href="#membership"
                   class="btn btn-primary"
                   data-bs-toggle="modal"
                   data-bs-target="#membershipTypeModal">
                    Request an Invitation for Membership
                </a>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const craneImg    = document.querySelector(".crane-img");
    const hollowTitle = document.querySelector(".huge-title-hollow");
    const cutoutTitle = document.querySelector(".huge-title-cutout");

    if (!craneImg || !hollowTitle || !cutoutTitle) return;

    const layers = [hollowTitle, cutoutTitle];

    function setMaskImage() {
        const src = craneImg.currentSrc || craneImg.src; // absolute, already resolved
        layers.forEach(el => el.style.setProperty("--mask-img", `url("${src}")`));
    }

    function updateMask() {
        const img = craneImg.getBoundingClientRect();

        layers.forEach(el => {
            const t = el.getBoundingClientRect();
            el.style.setProperty("--mask-x", `${Math.round(img.left - t.left)}px`);
            el.style.setProperty("--mask-y", `${Math.round(img.top - t.top)}px`);
            el.style.setProperty("--mask-width", `${Math.round(img.width)}px`);
            el.style.setProperty("--mask-height", `${Math.round(img.height)}px`);
        });

        requestAnimationFrame(updateMask);
    }

    function start() {
        setMaskImage();
        updateMask();
    }

    craneImg.complete ? start() : craneImg.addEventListener("load", start);
});
</script>