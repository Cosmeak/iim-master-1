//
//  BookModel.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class Book: Identifiable {
    var uuid: UUID = UUID()
    var title: String
    var author: String
    var readDate: Date
    
    init(title: String, author: String, readDate: Date) {
        self.title = title
        self.author = author
        self.readDate = readDate
    }
}
