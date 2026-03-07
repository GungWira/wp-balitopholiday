/**
 * Custom Navbar Block — navbar-editor.js
 * Registrasi block di Gutenberg editor (view saja, tidak ada controls)
 */
(function (blocks, element) {
  'use strict';

  var el = element.createElement;

  blocks.registerBlockType('travelverse-child/custom-navbar', {
    edit: function () {
      return el(
        'div',
        {
          style: {
            background: '#ffffff',
            border: '2px dashed #2e7d32',
            borderRadius: '8px',
            padding: '16px 24px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'space-between',
            gap: '16px',
          },
        },
        // Left: label
        el(
          'div',
          {
            style: {
              display: 'flex',
              alignItems: 'center',
              gap: '10px',
            },
          },
          el(
            'span',
            {
              style: {
                fontSize: '20px',
              },
            },
            '🧭'
          ),
          el(
            'div',
            null,
            el(
              'strong',
              {
                style: {
                  display: 'block',
                  fontSize: '14px',
                  color: '#1a1a1a',
                },
              },
              'Custom Navbar'
            ),
            el(
              'span',
              {
                style: {
                  fontSize: '12px',
                  color: '#666',
                },
              },
              'Desktop nav + Hamburger mobile + WhatsApp'
            )
          )
        ),
        // Right: badge
        el(
          'span',
          {
            style: {
              background: '#e8f5e9',
              color: '#2e7d32',
              fontSize: '11px',
              fontWeight: '600',
              padding: '4px 10px',
              borderRadius: '20px',
              border: '1px solid #a5d6a7',
              whiteSpace: 'nowrap',
            },
          },
          '✓ Aktif di Frontend'
        )
      );
    },

    // Block ini server-side rendered, save selalu null
    save: function () {
      return null;
    },
  });
})(window.wp.blocks, window.wp.element);
