# Changelog

## 1.5.84-alpha

*Added*
- **74 Feature tests**

*Updated*
- `verifiedCitizen`, `moderator`, `administrator` and `superAdministrator` functions in `UserFactory`

*Fixed*
- User profile nickname update not taken into account
- Fatal error when updating user email to an already used email
- Cannot remove a user's nickname once set
- Cannot remove a user's description once set
- Authenticated user can't delete his account
- When *force deleting* a resource, the deletion is not cascading to the ressourceable
- Authentification tests constantly failing

### 1.5.71-alpha

*Updated*
- Drastically reduced the time for tests completion (approx. divided by 7)
- Tests no longer leave data in the database after completion

*Fixed*
- All data is erased from database when running tests

### 1.5.68-alpha

*Added*
- `StatistiqueController` with 18 functions
- New localizations
- **Statistics** dashboard
- *Statistics* access in the main dashboard for a user with administrator rights
- [Laravel Charts (Chartisan + echarts)](https://charts.erik.cat/)
- [Laravel Excel for CSV/XLSX exports](https://docs.laravel-excel.com/3.1/getting-started/installation.html)
- [Daisy UI modals](https://daisyui.com/components/modal/)
- **11 statistics charts** with their exports
- **5 statistics counts**
- Statistics export format picker
- Livewire `StatsDashboard` component
- `bar`, `doughnut-double`, `line` and `pie` and 4 other chart related components
- 4 chart sections
- `charts` config file containing sets of colors for charts
- Statistics menu animations

*Updated*
- **Seeders and factories for both number and relevance of data**
- `GroupeFactory` generated name

*Fixed*
- Progression not working if no previous progression interaction with the resource
- Resource status staying in `pending` after aproving moderation
- Fatal error when connecting to an account without any chat group
- *Livewire assets are out of date*

### 1.4.94-alpha

*Hotfix*
- Attempt to increment/decrement property "search_count" on null during a search in the catalogue

### 1.4.93-alpha

*Added*
- Seeder : `groupe_user` pivot table now seeded with two groups of both two members

*Fixed*
- Catalogue search showing non published resources
- Resource status switching to pending after being consulted since the 1.4.2 update

### 1.4.9-alpha

*Added*
- No robots indexing for the UAT environement
- New localizations for RessourceType with all lowercase letters
- New localizations for chat related informations
- Removed the dbfill_faker helper function, ==deprecated since 1.1.4-alpha==
- autoRefresh functionnality to the chat component
- Chat message validation rules
- Chat message web component with authentificated user detection and conditional displays
- New Chat icon

*Updated*
- Reforged chat (more interactive, more responsives, more animated, faster to load,...)
- Chat position on screen
- Livewire view `chat-message` changed to `chat`
- Livewire ChatMessage controller's `groupe` property changed to `selected_group` for more clarity
- reverse_types array's values switched to full lowercase in AppServiceProvider
- Removed a useless `user_id` property and unsued traits in the Livewire ChatMessage controller
- Main body section minimum height set to 80vh
- No more notifications with `npm run watch` after the initial one

*Fixed*
- Catalogue not displaying correct resources list at first load (before any searches)
- Server error when trying to access a page containing resource icon components on the UAT environement
- GroupeFactory error during seeding on the UAT environement
- last_connection column throwing error during migration on the UAT environement
- Server error when loading a page containing the chat component with an unconnected user
- Avatar icon wrongly set in the portrait web component
- Page reloading when pressing the `Enter` key in chat component instead of hitting the `Send` button
- Npm child warning