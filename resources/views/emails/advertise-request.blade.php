<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="utf-8">
    <title>नयाँ विज्ञापन अनुरोध</title>
</head>
<body style="font-family: sans-serif; background:#F5F1EA; padding: 24px; color:#0F172A;">
    <div style="max-width:600px;margin:0 auto;background:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e5e1d8;">
        <div style="background:#1E3A5F;padding:18px 24px;">
            <h2 style="color:#ffffff;margin:0;font-size:18px;">नयाँ विज्ञापन अनुरोध प्राप्त भयो</h2>
        </div>
        <div style="padding:24px;">
            <table style="width:100%;border-collapse:collapse;font-size:14px;">
                <tr>
                    <td style="padding:8px 0;color:#57534E;width:160px;">नाम</td>
                    <td style="padding:8px 0;font-weight:600;">{{ $contact->name }}</td>
                </tr>
                <tr>
                    <td style="padding:8px 0;color:#57534E;">इमेल</td>
                    <td style="padding:8px 0;font-weight:600;">{{ $contact->email }}</td>
                </tr>
                <tr>
                    <td style="padding:8px 0;color:#57534E;">फोन</td>
                    <td style="padding:8px 0;font-weight:600;">{{ $contact->phone }}</td>
                </tr>
                <tr>
                    <td style="padding:8px 0;color:#57534E;">कम्पनीको नाम</td>
                    <td style="padding:8px 0;font-weight:600;">{{ $contact->company_name }}</td>
                </tr>
                <tr>
                    <td style="padding:8px 0;color:#57534E;">सेवा प्रकार</td>
                    <td style="padding:8px 0;font-weight:600;">{{ $serviceTypeLabel }}</td>
                </tr>
            </table>

            @if($contact->message)
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid #e5e1d8;">
                <p style="color:#57534E;margin:0 0 6px 0;font-size:14px;">सन्देश</p>
                <p style="margin:0;line-height:1.6;">{{ $contact->message }}</p>
            </div>
            @endif
        </div>
        <div style="background:#F5F1EA;padding:14px 24px;font-size:12px;color:#57534E;">
            यो इमेल तपाईंको वेबसाइटको विज्ञापन सम्पर्क फारमबाट स्वचालित रूपमा पठाइएको हो।
        </div>
    </div>
</body>
</html>
