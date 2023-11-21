//
//  AddBookView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct NewBookView: View {
    @StateObject var bookViewModel = NewBookViewModel()
    @Binding var newBookViewShowed: Bool
    @Binding var books: [Book]
    
    var body: some View {
        VStack(content: {
            Text("New books")
                .font(.system(size: 32))
                .padding()
            Form(content: {
                TextField("Title", text: $bookViewModel.title)
                TextField("Author", text: $bookViewModel.author)
                DatePicker("Read Date", selection: $bookViewModel.readDate, in: Date()..., displayedComponents: .date)
                
                Button {
                    let book = bookViewModel.createNewBook()
                    books.append(book)
                    newBookViewShowed = false
                } label: {
                    Text("Save")
                }
                .padding(16)
                .background(Color.blue)
                .foregroundColor(.white)
                .cornerRadius(4)

            })
        })
    }
}

#Preview {
    NewBookView(
        newBookViewShowed: Binding(get: {
            return true
        }, set: { _ in
            
        }),
        books: Binding(get: {
            return []
        }, set: { _ in
            
        })
    )
}
