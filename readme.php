<?php
// content-blur.php (or index.php)
// Simple PHP page that renders your project documentation as HTML.

$title = "Content Blur for XenForo";
$downloadUrl = "https://shadowcoders.net/resources/content-blur.1/";
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="description" content="Guest-only content blur for XenForo to encourage registration without blocking discussions." />
  <style>
    :root {
      --bg: #0b0f14;
      --panel: #0f1620;
      --text: #e6edf3;
      --muted: #a8b3bf;
      --border: #243041;
      --accent: #3b82f6;
      --warnBg: rgba(245, 158, 11, 0.10);
      --warnBorder: rgba(245, 158, 11, 0.35);
      --codeBg: rgba(255, 255, 255, 0.06);
    }
    @media (prefers-color-scheme: light) {
      :root {
        --bg: #f7f8fb;
        --panel: #ffffff;
        --text: #0b1220;
        --muted: #4b5563;
        --border: #e5e7eb;
        --accent: #2563eb;
        --warnBg: rgba(245, 158, 11, 0.12);
        --warnBorder: rgba(245, 158, 11, 0.35);
        --codeBg: rgba(0, 0, 0, 0.05);
      }
    }
    body {
      margin: 0;
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
      background: var(--bg);
      color: var(--text);
      line-height: 1.6;
    }
    .wrap {
      max-width: 980px;
      margin: 0 auto;
      padding: 28px 18px 48px;
    }
    .card {
      background: var(--panel);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 22px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.18);
    }
    h1 { margin: 0 0 10px; font-size: 32px; letter-spacing: -0.02em; }
    h2 { margin: 26px 0 10px; font-size: 20px; letter-spacing: -0.01em; }
    p { margin: 10px 0; color: var(--text); }
    .muted { color: var(--muted); }
    ul { margin: 10px 0 10px 22px; padding: 0; }
    li { margin: 6px 0; }
    a {
      color: var(--accent);
      text-decoration: none;
    }
    a:hover { text-decoration: underline; }
    .callout {
      margin: 14px 0 18px;
      padding: 14px 14px;
      border-radius: 12px;
      background: var(--warnBg);
      border: 1px solid var(--warnBorder);
    }
    .callout strong { display: inline-block; margin-right: 6px; }
    .btnrow { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 14px; }
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 12px;
      border-radius: 12px;
      border: 1px solid var(--border);
      background: transparent;
      color: var(--text);
      text-decoration: none;
    }
    .btn.primary {
      border-color: rgba(59,130,246,0.35);
      background: rgba(59,130,246,0.12);
    }
    .btn:hover { border-color: rgba(59,130,246,0.55); }
    hr { border: 0; border-top: 1px solid var(--border); margin: 22px 0; }
    code, pre {
      font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
    }
    .note {
      background: var(--codeBg);
      border: 1px solid var(--border);
      padding: 10px 12px;
      border-radius: 12px;
      margin: 10px 0;
    }
    footer {
      margin-top: 18px;
      font-size: 13px;
      color: var(--muted);
    }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
      <p class="muted">
        Automatic <strong>guest-only content blur</strong> designed to encourage forum registration without blocking discussions.
      </p>

      <div class="callout">
        <p style="margin:0;">
          <strong>⚠️ Important</strong>
          This repository contains <strong>documentation and support resources only</strong>.
          <br />
          <strong>The XenForo add-on source code is NOT included in this repository.</strong>
        </p>
      </div>

      <h2>Overview</h2>
      <p>
        Content Blur selectively obscures content for <strong>unregistered guests</strong> while allowing registered members to view everything normally.
        This creates a natural incentive for visitors to sign up without hard paywalls, redirects, or permission walls.
      </p>
      <p><strong>The goal is simple:</strong><br />Guests can preview. Members get full access.</p>

      <h2>Key Features</h2>
      <ul>
        <li>Automatic content blur for <strong>unregistered visitors</strong></li>
        <li>Clear <strong>Register / Log in</strong> call-to-action overlay</li>
        <li>No action required from content authors</li>
        <li>SEO-friendly (content remains in page source)</li>
        <li>Responsive and theme-compatible</li>
        <li>Lightweight implementation (no heavy scripts)</li>
      </ul>

      <h2>Use Cases</h2>
      <ul>
        <li>Increase forum registrations</li>
        <li>Protect high-value posts or images from guests</li>
        <li>Encourage account creation without restricting threads</li>
        <li>Soft content gating for community growth</li>
        <li>Public visibility with controlled access</li>
      </ul>

      <h2>Distribution</h2>
      <p>The add-on is distributed through the <strong>XenForo Resource Manager</strong>.</p>

      <div class="btnrow">
        <a class="btn primary" href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">
          ➡️ Download / Purchase
        </a>
        <a class="btn" href="https://shadowcoders.net/" target="_blank" rel="noopener noreferrer">
          ShadowCoders Forum
        </a>
      </div>

      <h2>Support</h2>
      <p>Please open a GitHub issue for:</p>
      <ul>
        <li>Bug reports</li>
        <li>Feature requests</li>
        <li>Compatibility questions</li>
      </ul>
      <p>When reporting issues, include:</p>
      <ul>
        <li>XenForo version</li>
        <li>PHP version</li>
        <li>Theme/style name</li>
        <li>Steps to reproduce</li>
      </ul>

      <h2>Repository Scope</h2>
      <p>This repository intentionally excludes:</p>
      <ul>
        <li>PHP source code</li>
        <li>XenForo add-on files</li>
        <li>Templates, JavaScript, or CSS</li>
        <li>Build artifacts or release archives</li>
      </ul>
      <p>It exists solely for:</p>
      <ul>
        <li>Documentation</li>
        <li>Issue tracking</li>
        <li>Public roadmap and announcements</li>
      </ul>

      <h2>License</h2>
      <div class="note">
        Documentation and text in this repository are provided for informational purposes only.
        No rights to the add-on source code are granted by this repository.
      </div>

      <h2>Disclaimer</h2>
      <div class="note">
        XenForo® is a registered trademark of XenForo Ltd.
        This project is not affiliated with or endorsed by XenForo Ltd.
      </div>

      <footer>
        <hr />
        <div>Rendered as PHP/HTML for easy hosting.</div>
      </footer>
    </div>
  </div>
</body>
</html>
