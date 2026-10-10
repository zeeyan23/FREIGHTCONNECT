<section class="news-section" id="newsSection">

    <div class="news-sticky">


        <div class="card-stack">


            <article class="news-card card-1">

                <div class="card-image">

                    <img
                        src="https://images.unsplash.com/photo-1494412574643-ff11b0a5c1c3?auto=format&fit=crop&w=900&q=80"
                        alt="Global logistics"
                    >

                </div>


                <div class="card-content">

                    <span class="card-category">
                        Logistics
                    </span>

                    <h2>
                        Black Sea disruption cancels 20,000 tonnes of India-bound sunflower oil 7 October 2026
                    </h2>

                    <p>
                        Black Sea port damage cancelled a 20,000-tonne Russian sunflower-oil shipment to India, Reuters reported, 
                        citing an industry official. Trade sources said another 60,000 tonnes were delayed. Sellers are exploring St Petersburg 
                        and Ust-Luga departures, which the official said add 10 voyage days and higher freight costs. 
                        Indian buyers purchased 150,000 tonnes of crude palm oil over three days for November–December shipment. 
                        Importers face disrupted sunflower-oil deliveries and longer, more expensive Baltic routing alternatives. 
                    </p>
                    <div class="news-source"> <span>Source:</span> <strong>Reuters</strong> </div>
                    <a href="#" class="read-more">
                        Read More →
                    </a>

                </div>

            </article>

            <article class="news-card card-2">

                <div class="card-image">

                    <img
                        src="https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?auto=format&fit=crop&w=900&q=80"
                        alt="Global trade"
                    >

                </div>


                <div class="card-content">

                    <span class="card-category">
                        Global Trade
                    </span>

                    <h2>
                        UK proposes duties of up to 63.66% on Chinese titanium dioxide 7 October 2026
                    </h2>

                    <p>
                        Trade Remedies Authority. The UK Trade Remedies Authority proposed five-year anti-dumping duties on Chinese rutile 
                        titanium dioxide, used in coatings, plastics and paper. Cooperating exporters would face 48.29%, with a minimum of 
                        GBP 0.665/kg; other exporters would face 63.66%, with a minimum of GBP 0.876/kg. The proposal applies whichever 
                        calculation produces the higher duty. Interested parties have until 26 October 2026 to comment before the authority 
                        submits its final recommendation. UK importers and Chinese suppliers should assess the proposed landed-cost exposure, 
                        while recognising that these duties have not yet been adopted.
                    </p>

                    <div class="news-source"> <span>Source:</span> <strong>UK Trade Remedies Authority — Proposed titanium dioxide duties</strong> </div>

                    <a href="#" class="read-more">
                        Read More →
                    </a>

                </div>

            </article>



            <!-- ==========================
                 CARD 3
            ========================== -->

            <article class="news-card card-3">

                <div class="card-image">

                    <img
                        src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
                        alt="Shipping containers"
                    >

                </div>


                <div class="card-content">

                    <span class="card-category">
                        Business
                    </span>

                    <h2>
                        FreightConnect Soft Launch Coming Soon Alliance Update
                    </h2>

                    <p>
                        FreightConnect – Global Trade Alliance is preparing for its soft launch, bringing together Trade Partners and 
                        Freight-Forwarding Members to explore trade opportunities, freight requirements and cross-border business relationships.
                        Details on membership and how to get involved will be announced soon. Stay connected as we prepare to welcome our first Members.
                        TRADE. CONNECT. GROW.
                    </p>

                    
                    <a href="#" class="read-more">
                        Read More →
                    </a>

                </div>

            </article>


        </div>

        <div class="all-news" id="allNews">

            <a href="news.html">
                View All News →
            </a>

        </div>


    </div>

</section>

<script>
const section =
    document.getElementById("newsSection");


const card2 =
    document.querySelector(".card-2");


const card3 =
    document.querySelector(".card-3");


const allNews =
    document.getElementById("allNews");


window.addEventListener("scroll", function () {

    const rect =
        section.getBoundingClientRect();


    const sectionHeight =
        section.offsetHeight;


    const viewportHeight =
        window.innerHeight;


    let progress =
        -rect.top /
        (sectionHeight - viewportHeight);

    progress =
        Math.max(
            0,
            Math.min(1, progress)
        );

    if (progress < 0.10) {

        card2.style.opacity = 0;

        card2.style.transform =
            "translateY(100vh) rotate(8deg)";

    }

    else if (progress < 0.40) {


        let p =
            (progress - 0.10) / 0.30;


        card2.style.opacity = p;

        let y =
            100 - (p * 100);


        let rotation =
            8 - (p * 6);


        card2.style.transform =
            `translateY(${y}vh)
             rotate(${rotation}deg)`;

    }

    else {


        card2.style.opacity = 1;


        card2.style.transform =
            "translateY(0) rotate(2deg)";

    }

    if (progress < 0.45) {

        card3.style.opacity = 0;

        card3.style.transform =
            "translateY(100vh) rotate(-7deg)";

    }

    else if (progress < 0.75) {


        let p =
            (progress - 0.45) / 0.30;


        card3.style.opacity = p;


        let y =
            100 - (p * 100);


        let rotation =
            -7 + (p * 5);


        card3.style.transform =
            `translateY(${y}vh)
             rotate(${rotation}deg)`;

    }

    else {


        card3.style.opacity = 1;


        card3.style.transform =
            "translateY(0) rotate(-2deg)";

    }

    if (progress > 0.85) {

        allNews.classList.add("show");

    }
    else {

        allNews.classList.remove("show");

    }

});

</script>