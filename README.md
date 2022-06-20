# (RE)Sources Relationnelles

https://trello.com/b/qEJGzBTO/resources-relationnelles

---
## Changelog

### 1.4.94-alpha

*Hotfix*
- Attempt to increment/decrement property "search_count" on null during a search in the catalogue

### 1.4.93-alpha

*Added*
- Seeder : groupe_user pivot table now seeded with two groups of both two members

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