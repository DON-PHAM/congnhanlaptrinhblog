<?php

namespace App\Helpers;

class SeoHelper
{
    /**
     * Generate meta tags for a post
     */
    public static function generateMetaTags($post)
    {
        $metaTags = [];
        
        // Meta title
        $metaTags['title'] = $post->meta_title ?: $post->title;
        
        // Meta description
        $metaTags['description'] = $post->meta_description ?: $post->excerpt;
        
        // Meta keywords
        if ($post->meta_keywords) {
            $metaTags['keywords'] = $post->meta_keywords;
        }
        
        // Open Graph tags
        $metaTags['og'] = [
            'title' => $post->og_title ?: $post->title,
            'description' => $post->og_description ?: $post->excerpt,
            'type' => 'article',
            'url' => url('/posts/' . $post->slug),
        ];
        
        if ($post->og_image) {
            $metaTags['og']['image'] = $post->og_image;
        } elseif ($post->image) {
            $metaTags['og']['image'] = asset('storage/' . $post->image);
        }
        
        // Twitter Card tags
        $metaTags['twitter'] = [
            'card' => 'summary_large_image',
            'title' => $post->twitter_title ?: $post->title,
            'description' => $post->twitter_description ?: $post->excerpt,
        ];
        
        if ($post->twitter_image) {
            $metaTags['twitter']['image'] = $post->twitter_image;
        } elseif ($post->image) {
            $metaTags['twitter']['image'] = asset('storage/' . $post->image);
        }
        
        return $metaTags;
    }
    
    /**
     * Generate HTML meta tags
     */
    public static function generateHtmlMetaTags($post, $includeTitle = true)
    {
        $metaTags = self::generateMetaTags($post);
        $html = '';
        
        // Basic meta tags
        if ($includeTitle) {
            $html .= '<title>' . e($metaTags['title']) . '</title>' . "\n";
        }
        $html .= '<meta name="description" content="' . e($metaTags['description']) . '">' . "\n";
        
        if (isset($metaTags['keywords'])) {
            $html .= '<meta name="keywords" content="' . e($metaTags['keywords']) . '">' . "\n";
        }
        
        // Open Graph tags
        foreach ($metaTags['og'] as $property => $content) {
            $html .= '<meta property="og:' . $property . '" content="' . e($content) . '">' . "\n";
        }
        
        // Twitter Card tags
        foreach ($metaTags['twitter'] as $name => $content) {
            $html .= '<meta name="twitter:' . $name . '" content="' . e($content) . '">' . "\n";
        }
        
        return $html;
    }
    
    /**
     * Generate structured data (JSON-LD)
     */
    public static function generateStructuredData($post)
    {
        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post->title,
            'description' => $post->excerpt,
            'author' => [
                '@type' => 'Person',
                'name' => optional($post->user)->name
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('app.name')
            ],
            'datePublished' => $post->created_at->toISOString(),
            'dateModified' => $post->updated_at->toISOString(),
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => url('/posts/' . $post->slug)
            ]
        ];
        
        if ($post->image) {
            $structuredData['image'] = asset('storage/' . $post->image);
        }
        
        if ($post->category) {
            $structuredData['articleSection'] = $post->category->name;
        }
        
        return json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    
    /**
     * Generate canonical URL
     */
    public static function generateCanonicalUrl($url = null)
    {
        if ($url) {
            return url($url);
        }
        return request()->url();
    }
} 