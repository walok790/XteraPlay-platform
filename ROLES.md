# XteraPlay — Roles & Capabilities

This document lists what each role can do on the platform and suggests features
the admin can implement next.

---

## 🌐 GUEST (not signed in)

Guests are anyone visiting the site without a user or admin account.

### What guests can do

| Capability | Route / Location | Notes |
|---|---|---|
| Browse the landing page | `GET /` | Loads dynamic content: hero, features, pricing, approved reviews, CTA |
| Search Terabox links (limited) | Hero input on `/` | 5 daily free credits, no signup required |
| View pricing plans | `/#pricing` | Loaded from DB (`plans` table). Only shows `is_active` plans |
| View feature list | `/#features` | Loaded from `landing_features` table where `is_visible` |
| View approved user reviews | `/#reviews` | Only reviews where `is_approved = true` are shown |
| Read announcements (public) | Landing / footer | Public announcements only |
| Sign in | `GET/POST /login` | Standard email + password |
| Register account | `GET/POST /register` | Requires name, email, password, terms acceptance |
| Forgot / reset password | `/forgot-password`, `/reset-password/{token}` | Emails a signed reset link |
| Send contact message | `GET/POST /contact` | Saves to `messages` table for admin to see |
| Visit any admin-configured nav link | Dynamic from `landing_navs` table | Admin manages what shows in nav |

### What guests **cannot** do

- Cannot access `/dashboard`, `/home`, `/subscription`, `/bookmarks`,
  `/history`, `/transactions`, `/profile`, `/support` — these all redirect to `/login`
- Cannot submit reviews (must be logged in)
- Cannot create support tickets (must be logged in — but can use contact form)
- Cannot access any `/admin/*` route — redirected to `/admin/login`

---

## 👤 USER (authenticated)

Users are people who signed up via `/register`. They get everything guests do
plus a full personal dashboard and app features.

### What users can do

#### Account
| Capability | Route | Notes |
|---|---|---|
| View dashboard | `GET /dashboard` | Personal overview, stats, quick links |
| View home / search page | `GET /home` | Terabox search, stats, feedback form, announcements |
| Edit profile | `GET /profile`, `PATCH /profile` | Update name and email |
| Change password | `PUT /profile/password` | Requires current password |
| Verify email | `GET /email/verify` (notice), `GET /email/verify/{id}/{hash}` (signed) | Resendable via `POST /email/verification-notification` |
| Sign out | `POST /logout` | Invalidates session |

#### Subscription & billing
| Capability | Route | Notes |
|---|---|---|
| View available plans | `GET /subscription` | Shows all active plans dynamically from DB |
| Choose payment method | Buttons on plan cards | Auto Pay / Manual Pay (payment integration is placeholder — see suggestions) |
| Apply coupon code | Coupon input on `/subscription` | UI wired, admin manages coupons in DB |
| View transaction history | `GET /transactions` | Loads user's own transactions with status |

#### Content & features
| Capability | Route | Notes |
|---|---|---|
| Search & stream Terabox videos | Hero input on `/home` | Uses daily credits from user's plan |
| Bookmarks | `GET /bookmarks` | List of saved videos (UI placeholder) |
| Watch history | `GET /history` | History of streamed videos (UI placeholder) |
| Submit a review | `POST /reviews` | Requires rating 1–5 + message. **Saved with `is_approved = false` — admin must approve before it shows on landing** |
| Create support ticket | `GET/POST /support` | Subject, category, message → `tickets` table. Admin sees it in admin panel |
| View own tickets | `GET /support` | List of user's own tickets with status + admin replies |
| Receive notifications | Bell icon in navbar | Sample notifications shown (real notification system is a suggested feature) |

### What users **cannot** do

- Cannot approve their own reviews (only admin can approve)
- Cannot see other users' data (tickets, reviews, transactions are user-scoped)
- Cannot access `/admin/*` (redirects to admin login)
- Cannot bypass email verification for restricted actions if `email_verification_required` setting is on

---

## 🛡️ ADMIN (authenticated to admin panel)

Admins log in via a **separate** auth system at `/admin/login` using the `admin`
guard. They use the `admins` table (not `users`). Admins never see the public
site as an admin — they use a dedicated `/admin` panel with a sidebar layout.

### What admins can do

#### Dashboard & overview
| Capability | Route | Notes |
|---|---|---|
| View live stats | `GET /admin/dashboard` | Total users, active subscriptions, revenue MTD, open tickets |
| See action-required items | Dashboard banner | Highlights pending reviews and unread messages |
| Recent signups | Dashboard sidebar | 5 newest users |
| Quick actions | Dashboard sidebar | Direct links to create Plan, Coupon, Landing edit, Reviews |

#### Users management
| Capability | Route | Notes |
|---|---|---|
| List all users (with search) | `GET /admin/users?search=` | Search by name or email |
| Create user | `GET /admin/users/create`, `POST /admin/users` | Manually create verified users |
| Edit user | `GET /admin/users/{user}/edit`, `PUT /admin/users/{user}` | Update name, email, optionally reset password |
| Delete user | `DELETE /admin/users/{user}` | Cascades to their tickets, subscriptions, transactions, reviews |

#### Subscription plans
| Capability | Route | Notes |
|---|---|---|
| List all plans | `GET /admin/plans` | Shows all plans (active + inactive) |
| Create plan | `GET /admin/plans/create`, `POST /admin/plans` | Set name, price, features (one per line), popular flag, active flag |
| Edit plan | `GET /admin/plans/{plan}/edit`, `PUT /admin/plans/{plan}` | Update any field, toggle active/popular |
| Delete plan | `DELETE /admin/plans/{plan}` | Confirmation prompt |

**Immediate effect:** Any plan changes reflect on the public `/` landing page
and `/subscription` page instantly (no cache to bust).

#### Active subscriptions
| Capability | Route | Notes |
|---|---|---|
| View all subscriptions | `GET /admin/subscriptions` | Grouped stats + full list with user, plan, status |
| Cancel subscription | `POST /admin/subscriptions/{subscription}/cancel` | Marks as cancelled with timestamp |

#### Coupons
| Capability | Route | Notes |
|---|---|---|
| List coupons | `GET /admin/coupons` | With status badges (Active, Scheduled, Expired) |
| Create coupon | `GET /admin/coupons/create`, `POST /admin/coupons` | Code, type (%/$), value, usage limit, start/expire dates, active toggle |
| Edit coupon | `GET /admin/coupons/{coupon}/edit`, `PUT /admin/coupons/{coupon}` | Any field |
| Delete coupon | `DELETE /admin/coupons/{coupon}` | Confirmation prompt |

#### Reviews (approval flow)
| Capability | Route | Notes |
|---|---|---|
| List reviews (filter: all/pending/approved) | `GET /admin/reviews?filter=` | Rating summary + counts |
| Approve review | `POST /admin/reviews/{review}/approve` | Only approved reviews show on landing |
| Unapprove review | `POST /admin/reviews/{review}/reject` | Remove from landing without deleting |
| Toggle "featured" status | `POST /admin/reviews/{review}/featured` | Featured reviews can be prioritized |
| Delete review | `DELETE /admin/reviews/{review}` | Permanent |

#### Support tickets
| Capability | Route | Notes |
|---|---|---|
| List all tickets | `GET /admin/support` | With filters by status/priority + stats |
| View & reply to a ticket | `GET /admin/support/{ticket}`, `POST /admin/support/{ticket}/reply` | Message the user + set status |
| Change ticket status | `POST /admin/support/{ticket}/status` | open → pending → resolved → closed |
| Delete ticket | `DELETE /admin/support/{ticket}` | Permanent |

#### Contact messages
| Capability | Route | Notes |
|---|---|---|
| List messages | `GET /admin/messages?filter=` | Filter: all / unread / replied. Unread ones highlighted |
| Reply via email | `mailto:` link on each message | Opens default mail client |
| Mark as read | `POST /admin/messages/{message}/read` | |
| Mark as replied | `POST /admin/messages/{message}/replied` | |
| Delete message | `DELETE /admin/messages/{message}` | |

#### Landing page management (⭐ major feature)
Located at `GET /admin/landing`. Four tabs:

1. **Section Visibility** — toggle whether these show on `/`:
   - Features section
   - Supported Domains row
   - Pricing section
   - Reviews / testimonials section
   - Bottom CTA
2. **Content** — edit the actual text on the landing page:
   - Hero: badge text, title line 1, title line 2 (gradient), description
   - Section headings & subheadings for Features, Pricing, Reviews
3. **Feature Cards** — CRUD for the feature cards shown in the Features section
   (title, description, icon color, order, visibility toggle)
4. **Nav Links** — CRUD for guest nav links (label, URL, order, visibility).
   These replace the hardcoded nav on all guest-facing pages

**All changes are live immediately** — no caching, no rebuild needed.

#### Currencies
| Capability | Route | Notes |
|---|---|---|
| List currencies | `GET /admin/currencies` | With default marker + active status |
| Add currency | `POST /admin/currencies` | Inline form: code, name, symbol, rate |
| Delete currency | `DELETE /admin/currencies/{currency}` | Blocked for the default currency |

#### Announcements
| Capability | Route | Notes |
|---|---|---|
| List announcements | `GET /admin/announcements` | Newest first |
| Create announcement | `POST /admin/announcements` | Title, message, type (info/success/warning/notice), publish date |
| Toggle active | `POST /admin/announcements/{announcement}/toggle` | Publish / unpublish |
| Delete | `DELETE /admin/announcements/{announcement}` | |

Announcements show up on the user home page (`/home`) automatically.

#### Site settings
| Capability | Route | Notes |
|---|---|---|
| View site settings | `GET /admin/settings` | Grouped by category |
| Update settings | `PUT /admin/settings` | Site name, tagline, support email, free daily credits + boolean toggles (registration, email verification, API, maintenance mode) |

#### System info
| Capability | Route | Notes |
|---|---|---|
| View environment | `GET /admin/system` | Laravel version, PHP version, DB connection, cache/session drivers, loaded extensions |

---

## 🔐 Security enforcement

- **Guest routes** are protected by the `guest` middleware — a logged-in user
  visiting `/login` is redirected to `/dashboard`
- **User routes** are protected by the `auth` middleware
- **Admin routes** are protected by the custom `AdminAuth` middleware which
  checks `Auth::guard('admin')->check()` — a normal user visiting `/admin/*`
  is redirected to `/admin/login`
- All forms use CSRF tokens via `@csrf`
- Destructive actions use `onsubmit="return confirm(…)"` prompts
- The Ticket controller enforces ownership: `abort_unless($ticket->user_id === Auth::id(), 403)`
- Password reset links are signed and rate-limited (`throttle:6,1`)
- Email verification uses Laravel's signed URL mechanism

---

## 🚀 More features the admin can implement next

These are natural extensions of what's already built. All the plumbing
(models, migrations, admin panel) is in place — these mostly need controllers
and views wired up.

### Payments & billing
- **Stripe/Razorpay integration** — actually charge users when they hit Auto Pay.
  Currently the buttons are placeholders. Wire up a `PaymentController`
  that creates a Stripe Checkout Session and updates `transactions` on webhook.
- **Manual payment approval flow** — for the "Manual Pay" button, let users
  upload a receipt/screenshot and let admin approve/reject in `/admin/transactions`
- **Refunds** — admin action on a transaction that reverses status and calls
  the payment gateway refund API
- **Invoicing** — generate PDF invoices per transaction (the project already
  has `barryvdh/laravel-dompdf` in the requirements)
- **Recurring billing** — a scheduled job that renews active subscriptions and
  creates new transactions on their `ends_at` date

### Terabox actually working
- **Terabox API integration** — the search input is UI-only right now. Wire up
  a `TeraboxService` that resolves share links to direct video URLs
- **Watch counter** — decrement daily credits on each successful stream, reset
  daily via a scheduled command
- **History persistence** — save each successful stream into a `history` table,
  show on `/history`
- **Bookmarks** — let users bookmark videos, show on `/bookmarks` with
  thumbnails and re-stream buttons
- **Batch downloads** — for Pro users, accept a list of links and queue a job
  to zip them up

### Notifications
- **Real notification system** — replace the sample bell dropdown with a
  `notifications` table (Laravel already provides `notifications` migration).
  Fire when a review is approved, ticket is replied to, subscription renews, etc.
- **Email digests** — weekly email of announcements + activity for users
- **Push notifications** — via web push API for logged-in browsers

### Roles & permissions
- **Multi-tier admins** — right now there's one admin role. Add a `role` column
  to `admins` (super-admin, moderator, support) and gate routes accordingly
- **Team accounts** — Enterprise plans could invite team members with limited
  permissions
- **API keys** — let Enterprise users generate/rotate API keys, track usage

### Content & marketing
- **Blog / posts** — a `posts` table with a public blog and admin CMS
- **SEO settings per page** — meta title, description, OG image managed from admin
- **A/B tests on landing** — hero variants that admin can toggle
- **Referral system** — user gets credits when they refer a signup
- **Newsletter signup** — capture emails on landing footer

### Analytics
- **Admin analytics page** — chart of signups over time, revenue over time,
  top features clicked, ticket volume trends
- **Per-user activity log** — record every important action in an
  `activity_log` table and show it on the user detail page

### Security hardening
- **2FA for admins** — TOTP via `laravel/fortify` or `pragmarx/google2fa`
- **IP-based rate limiting** on login attempts (Laravel provides this)
- **Session activity page** — show a user their active sessions and let them
  revoke devices
- **Audit log** — every admin action written to an `audit_log` table

### UX polish
- **Live search** — Alpine.js + debounce for admin tables
- **Bulk actions** — checkboxes + "delete selected" / "approve selected" bar
- **Dark mode toggle** — CSS variable + user preference stored in `users` table
- **Localization** — Laravel's `lang` files, admin picks default language
- **Image uploads** — profile avatars, review avatars, feature icons — using
  Laravel's file storage

### Integrations
- **Discord/Slack webhooks** — post new tickets, reviews, or signups to a channel
- **Zapier webhooks** — outgoing webhooks on every important event
- **Google Analytics / Plausible** — auto-inject tracking scripts based on
  an admin setting
- **OAuth logins** — sign in with Google, Discord, GitHub via `laravel/socialite`

---

## Data flow summary (user ↔ admin sync)

Here's how data moves between the two panels:

```
GUEST                 USER                  ADMIN
─────                 ────                  ─────
Contact form   ────▶  ─────────────────▶   admin/messages
                      Create ticket   ─▶   admin/support
                      Submit review   ─▶   admin/reviews (pending)
                                              │
                                              │ approve
                                              ▼
                Landing page  ◀───────  is_approved=true
                                              │
                Pay for plan  ────────▶ admin/transactions + admin/subscriptions
                                              │
                      ◀────── admin cancels ──┘

admin edits landing → landing_features / landing_navs / settings
     │
     ▼
Landing page reads settings + tables on every request → user sees it instantly
```

---

## Test accounts (from the seeder)

| Role | Email | Password |
|---|---|---|
| User (demo) | `demo@xteraplay.com` | `demo1234` |
| User | `sarah@example.com` | `password` |
| User | `ahmed@example.com` | `password` |
| Admin | `admin@xteraplay.com` | `admin1234` |
