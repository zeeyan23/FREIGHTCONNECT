<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Black Sea disruption cancels 20,000 tonnes of India-bound sunflower oil',
                'slug' => 'black-sea-disruption-india-sunflower-oil',
                'excerpt' => 'Black Sea port damage cancelled a 20,000-tonne Russian sunflower-oil shipment to India, while other shipments face delays and higher freight costs.',
                'content' => 'Black Sea port damage cancelled a 20,000-tonne Russian sunflower-oil shipment to India, Reuters reported, citing an industry official. Trade sources said another 60,000 tonnes were delayed. Sellers are exploring St Petersburg and Ust-Luga departures, which the official said add 10 voyage days and higher freight costs. Indian buyers purchased 150,000 tonnes of crude palm oil over three days for November–December shipment. Importers face disrupted sunflower-oil deliveries and longer, more expensive Baltic routing alternatives.',
                'image' => 'images/insights/IMG_3886.jpeg',
                'category' => 'Global Trade',
                'source_name' => 'Reuters',
                'source_url' => null,
                'status' => 'published',
                'published_at' => '2026-10-07 09:00:00',
            ],
            [
                'title' => 'UK proposes duties of up to 63.66% on Chinese titanium dioxide',
                'slug' => 'uk-proposes-duties-chinese-titanium-dioxide',
                'excerpt' => 'The UK Trade Remedies Authority proposed anti-dumping duties on Chinese titanium dioxide imports, potentially affecting importers and suppliers.',
                'content' => 'The UK Trade Remedies Authority proposed five-year anti-dumping duties on Chinese rutile titanium dioxide, used in coatings, plastics and paper. Cooperating exporters would face 48.29%, with a minimum of GBP 0.665/kg; other exporters would face 63.66%, with a minimum of GBP 0.876/kg. The proposal applies whichever calculation produces the higher duty. Interested parties have until 26 October 2026 to comment before the authority submits its final recommendation. UK importers and Chinese suppliers should assess the proposed landed-cost exposure, while recognising that these duties have not yet been adopted.',
                'image' => 'images/insights/IMG_3887.jpeg',
                'category' => 'Trade Policy',
                'source_name' => 'UK Trade Remedies Authority',
                'source_url' => null,
                'status' => 'published',
                'published_at' => '2026-10-07 10:00:00',
            ],
            [
                'title' => 'FreightConnect Soft Launch Coming Soon – Alliance Update',
                'slug' => 'freightconnect-soft-launch-alliance-update',
                'excerpt' => 'FreightConnect – Global Trade Alliance is preparing for its soft launch, bringing together Trade Partners and Freight-Forwarding Members.',
                'content' => 'FreightConnect – Global Trade Alliance is preparing for its soft launch, bringing together Trade Partners and Freight-Forwarding Members to explore trade opportunities, freight requirements and cross-border business relationships. Details on membership and how to get involved will be announced soon. Stay connected as we prepare to welcome our first Members. TRADE. CONNECT. GROW.',
                'image' => 'images/insights/IMG_3888.jpeg',
                'category' => 'FreightConnect Updates',
                'source_name' => 'FreightConnect',
                'source_url' => null,
                'status' => 'published',
                'published_at' => null,
            ],
        ];

        foreach ($articles as $article) {
            News::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}