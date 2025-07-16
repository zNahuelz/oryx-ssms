import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'permission_roles'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.integer('role_id').unsigned().references('id').inTable('roles').onDelete('CASCADE')
      table
        .integer('permission_id')
        .unsigned()
        .references('id')
        .inTable('permissions')
        .onDelete('CASCADE')
      table.primary(['role_id', 'permission_id'])
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
