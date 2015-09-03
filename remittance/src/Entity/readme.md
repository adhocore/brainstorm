## entities

- place entity definitions here (plain php objects)
- entites can be nested or grouped
- you can *skip* setter/getter for now

## conventions

- an entity should be in Monks\Entity namespace
- (the namespace can be as deep as seen logical)
- use cameCase for attribs and methods
- use StuldyCase for class/entity names
- use name="under_score" in db column annotations
- use singular name to represent entity. eg. Entity\User
- use plural name for database table (eg: users)
- use `protected` visibility for entity attribs
- define any constants in `UNDER_SCORED_ALL_CAPS`
