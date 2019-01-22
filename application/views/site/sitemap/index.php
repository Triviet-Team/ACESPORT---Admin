<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
    <?php
    foreach ($articles as $row) {
        $cate_slug = $row->cid == 1 ? 'tin-tuc' : 'dich-vu-ve-sinh';
        ?>
        <url>
            <loc><?= base_url($cate_slug . '/' . $row->vn_slug . '.html') ?></loc>
            <lastmod><?= date('c') ?></lastmod>
            <changefreq>daily</changefreq>
            <priority>0.5</priority>
        </url>
    <?php } ?>
</urlset>