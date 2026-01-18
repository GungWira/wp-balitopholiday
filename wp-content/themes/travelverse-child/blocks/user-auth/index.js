/**
 * User Auth Block - Editor Script
 * Path: theme/travel-child/blocks/user-auth/index.js
 */

(function (blocks, element, blockEditor) {
  const el = element.createElement;
  const registerBlockType = blocks.registerBlockType;

  registerBlockType("travelverse-child/user-auth", {
    title: "User Auth",
    icon: "admin-users",
    category: "theme",

    edit: function () {
      return el(
        "div",
        {
          className: "tv-user-auth tv-logged-out",
          style: {
            display: "flex",
            gap: "12px",
            alignItems: "center",
            justifyContent: "flex-end",
            borderRadius: "4px",
          },
        },
        el(
          "a",
          {
            className: "tv-btn tv-btn-login",
            href: "#",
            onClick: (e) => e.preventDefault(),
            style: {
              padding: "8px 24px",
              fontSize: "14px",
              fontWeight: "500",
              textDecoration: "none",
              borderRadius: "6px",
              display: "inline-block",
              textAlign: "center",
              cursor: "default",
              backgroundColor: "transparent",
              color: "#1a5f3f",
              border: "2px solid #1a5f3f",
              whiteSpace: "nowrap",
            },
          },
          "Log In"
        ),
        el(
          "a",
          {
            className: "tv-btn tv-btn-register",
            href: "#",
            onClick: (e) => e.preventDefault(),
            style: {
              padding: "8px 24px",
              fontSize: "14px",
              fontWeight: "500",
              textDecoration: "none",
              borderRadius: "6px",
              display: "inline-block",
              textAlign: "center",
              cursor: "default",
              backgroundColor: "#1a5f3f",
              color: "#ffffff",
              border: "2px solid #1a5f3f",
            },
          },
          "Register"
        )
      );
    },

    save: function () {
      return null; // Dynamic block rendered by PHP
    },
  });
})(window.wp.blocks, window.wp.element, window.wp.blockEditor);
