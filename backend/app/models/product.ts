import { DateTime } from 'luxon'
import { BaseModel, belongsTo, column } from '@adonisjs/lucid/orm'
import type { BelongsTo } from '@adonisjs/lucid/types/relations'
import Presentation from './presentation.js'

export default class Product extends BaseModel {
  @column({ isPrimary: true })
  declare id: number

  @column()
  declare name: string

  @column()
  declare description: string | null

  @column()
  declare barcode: string

  @column()
  declare image: string | null

  @column()
  declare buyPrice: number

  @column()
  declare sellPrice: number

  @column()
  declare stock: number

  @column()
  declare stockMin: number

  @column()
  declare visible: boolean

  @column({ columnName: 'presentation_id' })
  declare presentationId: number

  @column({ columnName: 'supplier_id' })
  declare supplierId: number

  @column.dateTime({ autoCreate: true })
  declare createdAt: DateTime

  @column.dateTime({ autoCreate: true, autoUpdate: true })
  declare updatedAt: DateTime

  @column.dateTime()
  declare deletedAt: DateTime | null

  @belongsTo(() => Presentation)
  declare presentation: BelongsTo<typeof Presentation>
}
