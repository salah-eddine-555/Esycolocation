<!DOCTYPE html>
<html>
<body style="font-family:sans-serif; background:#0d0d0d; padding:40px;">
  <div style="max-width:500px; margin:0 auto; background:#141414; border-radius:16px; padding:32px; border:1px solid rgba(255,255,255,0.08);">

    <h2 style="color:#00e5a0; margin:0 0 8px;">🏠 EasyColoc</h2>
    <p style="color:#888; font-size:13px; margin:0 0 24px;">Invitation à rejoindre une colocation</p>

    <p style="color:#fff;">Bonjour,</p>

    <a href="{{ url('/invitation/accept/'.$token) }}"
       style="display:inline-block; background:#00e5a0; color:#000; font-weight:bold; padding:14px 28px; border-radius:12px; text-decoration:none; margin:24px 0; font-size:15px;">
      Rejoindre la colocation →
    </a>


  </div>
</body>
</html>