import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'users'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id').notNullable()
      table.string('names', 60).notNullable()
      table.string('surnames', 60).nullable()
      table.string('dni', 15).notNullable().unique()
      table.string('phone_number', 20).nullable()
      table.string('address', 150).notNullable()
      table.string('email', 254).notNullable().unique()
      table.string('position', 30).notNullable
      table.string('password').notNullable()
      table.string('profile_picture', 255).notNullable()
      table.integer('role_id').unsigned().references('id').inTable('roles').onDelete('SET NULL')

      table.timestamp('created_at').notNullable()
      table.timestamp('updated_at').nullable()
      table.timestamp('deleted_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
