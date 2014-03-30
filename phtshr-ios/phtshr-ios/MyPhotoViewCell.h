//
//  MyPhotoViewCell.h
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-29.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface MyPhotoViewCell : UICollectionViewCell

@property (weak, nonatomic) IBOutlet UIImageView *image;
@property (weak, nonatomic) IBOutlet UILabel *imageTitle;

@end
