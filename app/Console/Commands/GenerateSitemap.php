<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'app:generate-sitemap';

    protected $description = 'Generate the XML sitemap';

    public function handle(): int
    {
        $baseUrl = rtrim(config('app.url'), '/');

        $sitemap = Sitemap::create();

        // Main public pages
        $staticPages = [
            '/',
            '/news',
            '/search/buyers',
            '/search/suppliers',
            '/request-membership/trade-partner',
            '/request-membership/freight-forwarding',
            '/legal/privacy-policy',
            '/legal/payment-recovery-support',
            '/legal/membership-terms',
            '/legal/external-privacy',
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(
                Url::create($baseUrl . $page)
                    ->setLastModificationDate(now())
            );
        }

        // Published news articles
        $newsArticles = News::query()
            ->where('status', 'published')
            ->get();

        foreach ($newsArticles as $article) {
            $sitemap->add(
                Url::create($baseUrl . '/news/' . $article->slug)
                    ->setLastModificationDate(
                        $article->updated_at ?? now()
                    )
            );
        }

        // Save sitemap inside Laravel public directory
        $sitemapPath = public_path('sitemap.xml');

        $sitemap->writeToFile($sitemapPath);

        // Copy to the actual domain document root
        $domainSitemapPath =
            '/home/u948060652/domains/freightconnect.info/public_html/sitemap.xml';

        if (!copy($sitemapPath, $domainSitemapPath)) {
            $this->error('Sitemap generated but could not be copied to public_html.');

            return self::FAILURE;
        }

        $this->info('Sitemap generated and copied successfully.');

        return self::SUCCESS;
    }
}
