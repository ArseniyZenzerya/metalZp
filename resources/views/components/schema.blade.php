<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Головна",
      "item": "{{ route('home') }}"
    },
    @foreach ($breadcrumbs as $index => $breadcrumb)
        {
          "@type": "ListItem",
          "position": {{ $index + 2 }},
      "name": "{{ $breadcrumb['title'] }}",
      "item": "{{ $breadcrumb['link'] }}"
    }{{ $loop->last ? '' : ',' }}
    @endforeach
    ]
  }
</script>
